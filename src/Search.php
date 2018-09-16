<?php
/**
 * Created by PhpStorm.
 * User: mostafa
 * Date: 09/14/2018
 * Time: 01:54 AM
 */

namespace Search;


use Illuminate\Http\Request;
use Search\Models\File;

class Search
{
    public function setViewSearch()
    {
        return view('ajax-search::search');
    }

    public function setResultSearch()
    {
        if (\request()->ajax()) {
            $output = "";
            $query = \request()->get('search');
            $files = File::where('title', 'LIKE', '%' . $query . '%')
                ->orWhere('price', 'LIKE', '%' . $query . '%')
                ->orWhere('body', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'asc')
                ->get();
            if ($files) {
                foreach ($files as $file) {
                    if (!auth()->check() && $file->price == "free") {
                        $output .= '
        <tr>
         <td class="text-right">' . $file->title . '</td>
         <td class="text-right">' . str_limit($file->body, 100) . '</td>
         <td class="text-right">' . '<a href="/login">ابتدا وارد وب سایت شوید</a>' . '</td>
         <td class="text-right">' . '<span>رایگان</span>' . '</td>
        </tr>
        ';
                    }
                    if (!auth()->check() && $file->price > 0) {
                        $output .= '
        <tr>
         <td class="text-right">' . $file->title . '</td>
         <td class="text-right">' . str_limit($file->body, 100) . '</td>
         <td class="text-right">' . '<a href="/login">ابتدا وارد وب سایت شوید</a>' . '</td>
         <td class="text-right">' . $this->convertToPersianNumber($file->price) . '</td>
        </tr>
        ';
                    }
                    if (auth()->check() && $file->price == 'free') {
                        $output .= '
        <tr>
         <td class="text-right">' . $file->title . '</td>
         <td class="text-right">' . str_limit($file->body, 100) . '</td>
         <td class="text-right">' . $file->linkFile . '</td>
         <td class="text-right">' . '<span>رایگان</span>' . '</td>
        </tr>
        ';
                    }
                    if (auth()->check() && $file->price > 0) {
                        $output .= '
        <tr>
         <td class="text-right">' . $file->title . '</td>
         <td class="text-right">' . str_limit($file->body, 100) . '</td>
         <td class="text-right">' .'<a href="#" class="btn btn-primary">خرید</a>'. '</td>
         <td class="text-right">' . $this->convertToPersianNumber($file->price). '</td>
        </tr>
        ';
                    }
                }
                return Response($output);
            }
        }

    }

    public function convertToPersianNumber($number)
    {
        $number = str_replace('0', '۰', $number);
        $number = str_replace('1', '۱', $number);
        $number = str_replace('2', '۲', $number);
        $number = str_replace('3', '۳', $number);
        $number = str_replace('4', '۴', $number);
        $number = str_replace('5', '۵', $number);
        $number = str_replace('6', '۶', $number);
        $number = str_replace('7', '۷', $number);
        $number = str_replace('8', '۸', $number);
        $number = str_replace('9', '۹', $number);
        return $number;


    }

}