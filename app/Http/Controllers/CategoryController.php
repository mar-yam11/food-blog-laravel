<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    // عرض قائمة جميع الفئات
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories')); // ملف عرض جديد: categories.index
    }

    // عرض الوصفات الخاصة بفئة معينة
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $posts = Post::where('category_id', $id)->with(['user', 'tags', 'comments'])->paginate(10);
        return view('categories.show', compact('category', 'posts')); // استخدام categories.show
    }
}