<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Halaman Detail Layanan Website Development
     */
    public function website()
    {
        return view('services.website');
    }

    /**
     * Halaman Detail Layanan Desain Grafis
     */
    public function graphicDesign()
    {
        return view('services.graphic-design');
    }

    /**
     * Halaman Detail Layanan Digital Marketing
     */
    public function digitalMarketing()
    {
        return view('services.digital-marketing');
    }

    /**
     * Halaman Detail Layanan Pengembangan Aplikasi
     */
    public function application()
    {
        return view('services.application');
    }

    /**
     * Halaman Detail Layanan Video Marketing
     */
    public function video()
    {
        return view('services.video');
    }

    /**
     * Halaman Detail Layanan SEO & Optimasi
     */
    public function seo()
    {
        return view('services.seo');
    }
}
