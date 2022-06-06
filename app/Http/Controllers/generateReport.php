<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class generateReport extends Controller
{
    //
    public function export(){
        $connect = mysqli_connect("localhost", "root", "", "wedMadeSimple");  
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=ApprovedVendors.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('ID', 'Name', 'Address', 'email', 'password', 'vendorType', 'file', 'description', 'img', 'view', 'bookNo', 'value', 'approves', 'paid', 'created_at'));  
        $query = "SELECT * from approveds ";  
        $result = mysqli_query($connect, $query);  
        while($row = mysqli_fetch_assoc($result))  
        {  
            fputcsv($output, $row);  
        }  
        fclose($output);   
    }

    public function exportBook(){
        $connect = mysqli_connect("localhost", "root", "", "wedMadeSimple");  
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=bookingDetails.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('ID', 'bookDate', 'Service', 'venEmail', 'email', 'comment', 'paid', 'created_at'));  
        $query = "SELECT * from book_details";  
        $result = mysqli_query($connect, $query);  
        while($row = mysqli_fetch_assoc($result))  
        {  
            fputcsv($output, $row);  
        }  
        fclose($output);   
    }

    public function exportContact(){
        $connect = mysqli_connect("localhost", "root", "", "wedMadeSimple");  
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=contactDetails.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('ID', 'Name', 'Number', 'Email', 'Comment', 'Reply','created_at'));  
        $query = "SELECT * from contacts";  
        $result = mysqli_query($connect, $query);  
        while($row = mysqli_fetch_assoc($result))  
        {  
            fputcsv($output, $row);  
        }  
        fclose($output);   
    }

    public function exportBooks(){
        $names=Session::get('user')['email'];
        $connect = mysqli_connect("localhost", "root", "", "wedMadeSimple");  
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=customerBookingDetails.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('ID', 'bookDate', 'service', 'venEmail', 'email', 'comment','paid', 'created_at'));  
        $query = "SELECT * from book_details where email='$names'";  
        $result = mysqli_query($connect, $query);  
        while($row = mysqli_fetch_assoc($result))  
        {  
            fputcsv($output, $row);  
        }  
        fclose($output); 
    }

    public function vendorExport(){
        $names=Session::get('user')['email'];
        $connect = mysqli_connect("localhost", "root", "", "wedMadeSimple");  
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=customerBookedDetails.csv');  
        $output = fopen("php://output", "w");  
        fputcsv($output, array('ID', 'bookDate', 'service', 'venEmail', 'email', 'comment','paid', 'created_at'));  
        $query = "SELECT * from book_details where venEmail='$names'";  
        $result = mysqli_query($connect, $query);  
        while($row = mysqli_fetch_assoc($result))  
        {  
            fputcsv($output, $row);  
        }  
        fclose($output); 
    }

    
}
