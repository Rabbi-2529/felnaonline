/* Felna Online — admin panel interactions */
(function ($) {
    "use strict";

    // ---- Mobile sidebar ----
    var body = document.body;
    function closeNav() { body.classList.remove("fa-nav-open"); }
    document.querySelectorAll("[data-fa-nav-toggle]").forEach(function (btn) {
        btn.addEventListener("click", function () { body.classList.toggle("fa-nav-open"); });
    });
    document.querySelectorAll("[data-fa-nav-close], .fa-backdrop").forEach(function (el) {
        el.addEventListener("click", closeNav);
    });
    document.addEventListener("keydown", function (e) { if (e.key === "Escape") closeNav(); });

    // ---- Status text -> badges ----
    var onWords = ["published", "active", "yes"];
    var offWords = ["unpublished", "not published", "inactive", "no"];
    document.querySelectorAll(".fa-page td").forEach(function (td) {
        if (td.children.length) return;
        var t = td.textContent.trim();
        var low = t.toLowerCase();
        if (onWords.indexOf(low) !== -1 || offWords.indexOf(low) !== -1) {
            var span = document.createElement("span");
            span.className = "fa-badge " + (onWords.indexOf(low) !== -1 ? "fa-badge-on" : "fa-badge-off");
            span.textContent = t;
            td.textContent = "";
            td.appendChild(span);
        }
    });

    // ---- Confirm before every delete ----
    document.querySelectorAll("form").forEach(function (form) {
        var method = form.querySelector('input[name="_method"]');
        if (!method || method.value.toUpperCase() !== "DELETE") return;
        // Remove old browser confirm() popups so the user is asked only once
        form.querySelectorAll("[onclick]").forEach(function (b) { b.removeAttribute("onclick"); });
        form.addEventListener("submit", function (e) {
            if (form.dataset.confirmed === "1") return;
            e.preventDefault();
            var row = form.closest("tr");
            var name = row && row.cells.length > 1 ? row.cells[1].textContent.trim() : "";
            if (typeof Swal === "undefined") {
                if (window.confirm("Delete this item? This cannot be undone.")) { form.dataset.confirmed = "1"; form.submit(); }
                return;
            }
            Swal.fire({
                title: "Delete this item?",
                html: (name ? "<strong>" + $("<div>").text(name).html() + "</strong><br>" : "") + "This cannot be undone.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete",
                cancelButtonText: "Cancel",
                confirmButtonColor: "#ed1c24",
                cancelButtonColor: "#6a7b72",
                reverseButtons: true,
                focusCancel: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.dataset.confirmed = "1";
                    form.submit();
                }
            });
        });
    });

    if (!$) return;

    $(function () {
        // ---- Data tables ----
        if ($.fn.DataTable) {
            $("#basic-datatables").DataTable({
                pageLength: 10,
                autoWidth: false,
                language: {
                    search: "",
                    searchPlaceholder: "Search…",
                    lengthMenu: "Show _MENU_",
                    info: "Showing _START_–_END_ of _TOTAL_",
                    infoEmpty: "No records",
                    zeroRecords: "Nothing matches your search",
                    emptyTable: "Nothing here yet",
                    paginate: { previous: "‹", next: "›" }
                }
            });
        }

        // ---- Image upload ----
        if ($.fn.dropify) {
            $(".dropify").dropify({
                messages: {
                    "default": "Drag an image here or click to choose",
                    replace: "Drag or click to replace",
                    remove: "Remove",
                    error: "Something went wrong"
                }
            });
        }

        // ---- Rich text editor ----
        if ($.fn.summernote) {
            $(".summernote").summernote({
                height: 260,
                toolbar: [
                    ["style", ["style"]],
                    ["font", ["bold", "italic", "underline", "clear"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["insert", ["link"]],
                    ["view", ["codeview"]]
                ]
            });
        }
    });
})(window.jQuery);
