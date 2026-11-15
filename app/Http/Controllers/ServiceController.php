<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;

class ServiceController extends Controller
{
    // ================= Service Category Methods ================= //

    /**
     * Display a list of service categories.
     */
    public function serviceCategories()
    {
        $categories = ServiceCategory::all();
        return view('admin.service_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new service category.
     */
    public function createServiceCategory()
    {
        return view('admin.service_categories.create');
    }

    /**
     * Store a newly created service category in the database.
     */
    public function storeServiceCategory(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        ServiceCategory::newServiceCategory($request); // Call the model's method to create a category

        return redirect()->route('service_categories.index')->with('success', 'Service Category created successfully.');
    }

    /**
     * Show the form for editing a service category.
     */
    public function editServiceCategory($id)
    {
        $category = ServiceCategory::findOrFail($id);
        return view('admin.service_categories.edit', compact('category'));
    }

    /**
     * Update an existing service category.
     */
    public function updateServiceCategory(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = ServiceCategory::findOrFail($id);
        ServiceCategory::updateServiceCategory($request, $category); // Call the model's method to update a category

        return redirect()->route('service_categories.index')->with('success', 'Service Category updated successfully.');
    }

    /**
     * Delete a service category.
     */
    public function destroyServiceCategory($id)
    {
        $category = ServiceCategory::findOrFail($id);
        ServiceCategory::deleteServiceCategory($category); // Call the model's method to delete a category

        return redirect()->route('service_categories.index')->with('success', 'Service Category deleted successfully.');
    }

    // ================= Service Methods ================= //

    /**
     * Display a list of services.
     */
    public function services()
    {
        $services = Service::with('category')->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function createService()
    {
        $categories = ServiceCategory::all();
        return view('admin.services.create', compact('categories'));
    }

    /**
     * Store a newly created service in the database.
     */
    public function storeService(Request $request)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        Service::newService($request); // Call the model's method to create a service

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing a service.
     */
    public function editService($id)
    {
        $service = Service::findOrFail($id);
        $categories = ServiceCategory::all();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    /**
     * Update an existing service.
     */
    public function updateService(Request $request, $id)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $service = Service::findOrFail($id);
        Service::updateService($request, $service); // Call the model's method to update the service

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Delete a service.
     */
    public function destroyService($id)
    {
        $service = Service::findOrFail($id);
        Service::deleteService($service); // Call the model's method to delete the service

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
