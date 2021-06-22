<?php

namespace ECC\Http\Controllers;

use ECC\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    protected $categoryRespository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRespository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRespository->listCategories();

        $this->setPageTitle('Categories', 'List of categories.');
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRespository->listCategories('id', 'asc');
        $this->setPageTitle('Categories', 'Create New Category');
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | max:191',
            'parent_id' => 'required | not_in:0',
            'image' => 'mimes:jpg,jpeg,png,',
        ]);

        $params = $request->except('_token');

        $category = $this->categoryRespository->createCategory($params);
        if(!$category)
        {
            return $this->responseRedirectBack('Error Encountered when trying to create category.', 'error', true, true);
        }else{
            return $this->responseRedirect('admin.categories.index','Category Created sucessfully', 'success', false, false);
        }
    }
}
