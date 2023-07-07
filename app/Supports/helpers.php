<?php
use Akaunting\Money\Money;
use App\Models\Course;
use App\Models\CourseReview;
use App\Models\EbookReview;
use App\Models\Lesson;
use App\Models\Product;

function formatCurrency($amount, $isoCode)
{
    if (!$amount) {
        return $amount;
    }
    $decimalPoint = currency($isoCode)->getDecimalMark();

    if ($decimalPoint == ",") {
        $amount = str_replace(".", ",", $amount);
    }

    return Money::$isoCode($amount, true)->format();
}
function getWorkspaceCurrency($settings)
{
    return $settings["currency"] ?? config("app.currency");
}

function getCourseRating($course_id)
{
    $total_ratings = CourseReview::where("course_id", $course_id)->count();
    $total_star_count = CourseReview::where("course_id", $course_id)->sum(
        "star_count"
    );

    if ($total_ratings > 0) {
        return round($total_star_count / $total_ratings);
    }

    return 0;
}
function getEbookRating($product_id)
{
    $total_ratings = EbookReview::where("product_id", $product_id)->count();
    $total_star_count = EbookReview::where("product_id", $product_id)->sum(
        "star_count"
    );

    if ($total_ratings > 0) {
        return round($total_star_count / $total_ratings);
    }

    return 0;
}
function getTotalLesson($course_id)
{
    $total_lessons = Lesson::where("course_id", $course_id)->count();
    return $total_lessons;
}

function renderRating($course_id)
{
    $rating = getCourseRating($course_id);
    $html = '<ul class="list-inline mb-0">';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $html .=
                '<li class="list-inline-item me-1 small"><i class="fas fa-star text-warning"></i></li>';
        } else {
            $html .=
                '<li class="list-inline-item me-1 small"><i class="far fa-star text-warning"></i></li>';
        }
    }
    $html .= "</ul>";
    return $html;
}

function renderEbookRating($product_id)
{
    $rating = getEbookRating($product_id);
    $html = '<ul class="list-inline mb-0">';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $html .=
                '<li class="list-inline-item me-1 small"><i class="fas fa-star text-warning"></i></li>';
        } else {
            $html .=
                '<li class="list-inline-item me-1 small"><i class="far fa-star text-warning"></i></li>';
        }
    }
    $html .= "</ul>";
    return $html;
}

function getCoursePrice($course_id)
{
    $course = Course::find($course_id);
    if ($course) {
        return $course->price;
    }
    return 0;
}
function getEbookPrice($product_id)
{
    $ebook = Product::find($product_id);
    if ($ebook) {
        return $ebook->price;
    }
    return 0;
}

function getCartTotalPrice()
{
    $total = 0;
    $cart = session()->get("cart");
    if (!empty($cart["course"])) {
        foreach ($cart["course"] as $value) {
            $total += $value->price;
        }
    }

    if (!empty($cart["ebook"])) {
        foreach ($cart["ebook"] as $value) {
            $total += $value->price;
        }
    }
    return $total;
}
