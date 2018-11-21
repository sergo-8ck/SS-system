<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index()
    {
      $customer_data = $this->get_customer_data();
    }

    function get_customer_data()
    {
      $customer_data = '<h1>Say Hello!</h1>';
      return $customer_data;
    }

    function pdf()
    {
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($this->convert_customer_data_to_html());
      return $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('reports.invoiceSell')->stream();
    }

    function convert_customer_data_to_html()
    {
      $customer_data = $this->get_customer_data();
      $output = '<h3>Hello</h3>';
      return $output;
    }
}
