<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\StoreDetail;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $fproducts = Product::where("isFeatured", true)->where("isInstock", true)->get();
        $allproducts = Product::where("isInstock", true)->get()->take(20);
        $categories = Category::all();
        $testimonials = Testimonial::all();
        $info = StoreDetail::all()->first();
        return view("app.home", compact("categories", "fproducts", "allproducts", "testimonials", "info"));
    }

    public function cart()
    {
        if (!auth()->check()) {
            session("url", "/cart");
            return redirect("/login");
        }
        $categories = Category::all();
        $info = StoreDetail::all()->first();
        return view("app.cart", compact("categories", "info"));
    }

    public function checkout()
    {
        if (!auth()->check()) {
            session("url", "/cart");
            return redirect("/login");
        }
        $categories = Category::all();
        $info = StoreDetail::all()->first();
        return view("app.checkout", compact("categories", "info"));
    }

    public function contact()
    {
        if (!auth()->check()) {
            session("url", "/contact");
            return redirect("/login");
        }
        $categories = Category::all();
        $info = StoreDetail::all()->first();
        return view("app.contact", compact("categories", "info"));
    }

    public function about()
    {
        if (!auth()->check()) {
            session("url", "/about");
            return redirect("/login");
        }
        $categories = Category::all();
        $info = StoreDetail::all()->first();
        return view("app.about", compact("categories", "info"));
    }
}
