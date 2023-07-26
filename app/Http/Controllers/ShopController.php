<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use App\Models\EbookReview;
use App\Models\Lesson;
use App\Models\Product;

use App\Models\ProductCategories;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopController extends BaseController
{
    public function products()
    {
        $products = Product::all();

        $users = User::all()
            ->keyBy("id")
            ->all();
        return \view("shop.products", [
            "selected_navigation" => "products",
            "products" => $products,
            "users" => $users,
        ]);
    }

    public function createProduct(Request $request)
    {
        $product = false;
        $outcomes = [];

        if ($request->id) {
            $product = Product::find($request->id);
        }

        $categories = ProductCategories::all();
        $lessons = Lesson::all();

        return \view("shop.add-product", [
            "selected_navigation" => "products",
            "product" => $product,
            "categories" => $categories,
            "lesson" => $lessons,
            "outcomes" => $outcomes,
        ]);
    }

    public function productPost(Request $request)
    {
        $request->validate([
            "name" => "required|max:150",
            "id" => "nullable|integer",
            "slug" => ["required", "max:150", "unique:courses,slug"],
            "image" => "nullable|file|mimes:jpeg,png,jpg,gif,svg",
            "file" => "nullable|file|mimes:pdf,doc,docx",

            "author_photo" => "nullable|file|mimes:jpeg,png,jpg,gif,svg",
        ]);

        $product = false;

        if ($request->id) {
            $product = Product::where("workspace_id", $this->user->workspace_id)
                ->where("id", $request->id)
                ->first();
        }

        if (!$product) {
            $product = new Product();
            $product->uuid = Str::uuid();
            $product->workspace_id = $this->user->workspace_id;
        }
        $cover_path = null;

        if ($request->image) {
            $cover_path = $request->file("image")->store("media", "uploads");
        }

        if (!empty($cover_path)) {
            $product->image = $cover_path;
        }

        if ($request->file) {
            $path = $request->file("file")->store("media", "uploads");
        }

        if (!empty($path)) {
            $product->file = $path;
        }

        $profile_path = null;

        if ($request->author_photo) {
            $profile_path = $request
                ->file("author_photo")
                ->store("media", "uploads");
        }

        if (!empty($profile_path)) {
            $product->author_photo = $profile_path;
        }

        $product->name = $request->name;
        $product->author_name = $request->author_name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->slug = $request->slug;
        $product->admin_id = $this->user->id;
        $product->description = clean($request->description);
        $product->author_description = clean($request->author_description);
        $product->save();

        return redirect("/products");
    }

    public function viewProduct(Request $request)
    {
        $product = false;
        $users = User::all()
            ->keyBy("id")
            ->all();

        if ($request->id) {
            $product = Product::where("workspace_id", $this->user->workspace_id)
                ->where("id", $request->id)
                ->first();
        }
        $total_reviews = EbookReview::where(
            "product_id",
            $request->id
        )->count();
        $reviews = EbookReview::where("product_id", $request->id)->get();
        $students = Student::all()
            ->keyBy("id")
            ->all();
        $total_ratings = EbookReview::where(
            "product_id",
            $request->id
        )->count();

        $total_star_count = EbookReview::where("id", $request->id)->sum(
            "star_count"
        );

        if ($total_ratings > 0) {
            $rating_out_of_five = round($total_star_count / $total_ratings);
        } else {
            $rating_out_of_five = 0;
        }

        return \view("shop.view-product", [
            "selected_navigation" => "products",
            "product" => $product,
            "users" => $users,
            "total_reviews" => $total_reviews,
            "reviews" => $reviews,
            "students" => $students,
            "rating_out_of_five" => $rating_out_of_five,
        ]);
    }

    public function categories()
    {
        $users = User::all();
        $categories = ProductCategories::all();

        return \view("shop.product-categories", [
            "selected_navigation" => "product-categories",
            "users" => $users,
            "categories" => $categories,
        ]);
    }

    public function categoryPost(Request $request)
    {
        $request->validate([
            "name" => "required|max:150",
            "category_id" => "nullable|integer",
        ]);

        $category = false;

        if ($request->category_id) {
            $category = ProductCategories::find($request->category_id);
        }

        if (!$category) {
            $category = new ProductCategories();
        }

        $category->name = $request->name;

        $category->save();

        return redirect()->back();
    }
    public function categoryEdit(Request $request)
    {
        $request->validate([
            "id" => "required|integer",
        ]);

        $category = ProductCategories::find($request->id);

        if ($category) {
            return response($category);
        }
    }
}
