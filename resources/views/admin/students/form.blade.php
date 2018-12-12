<!DOCTYPE html>
<html>
    <head>
        <title>Student Form</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.13/css/mdb.min.css" rel="stylesheet">        
    </head>
    <body>
            <table style="border: 1px solid black; border-collapse: collapse;">
                <tr>
                    <td style='width: 600px; padding: 5px;'>
                                <img src="{{ asset('/images/organization/logo.png') }}" alt="Aabroo Logo" style='display: inline-block; height: 70px; width: 100px;'>
                                <h3 style='display: inline-block; position: absolute; top: 2%; left: 35%; margin-bottom: 0; text-align: center; font-weight: bold;'>Aabroo Welfare High School</h3>
                                <h5 style='display: inline-block; position: absolute; top: 6%; left: 30%; margin-top: 0; text-align: center; font-weight: bold;'>“Educate a Child Program” Student Information Sheet</h5>
                    </td>
                </tr>

                <!-- Students Information -->

                <tr style="width: 80%; background: rgb(10,111,183);">
                    <th>
                        <p style='margin: 10px; font-weight: bold;'>Student Information</p>
                    </th>
                </tr>
                <tr>
                    <td style='padding: 10px;'>
                        <table style='padding: 10px; border-collapse: collapse; width:100%;'>
                            <tr>
                                <td>
                                    <label>Name: </label><span style='display: inline-block; width: 145px; font-weight: bold; border-bottom: 1px solid black; text-align: left; padding-left: 3px; padding-right: 10px; font-size: 14px; padding-bottom: 0px; margin-left: 10px;'> {{ $StudentsModel->name }} </span>
                                </td>
                                <td>
                                    <label>D.O.B: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 10px; padding-right: 10px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ date('F d, Y', strtotime($StudentsModel->date_of_birth)) }} </span>
                                </td>
                                <td>
                                    <label>Age: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 10px; padding-right: 10px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ \Carbon\Carbon::parse($StudentsModel->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y Years') }} </span>
                                </td>
                                <td rowspan='4'>
                                    <!-- <img src="" alt=""> -->
                                    <div style='width: 80px; height: 100px; margin-left: 10px; border: 1px solid black;'><img src="{{ asset($StudentsModel->image) }}" alt="Picture {{ $StudentsModel->name }}" style='height: 100px; width: 80px;'></div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Admission Date: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 10px; padding-right: 10px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ date('F d, Y', strtotime($StudentsModel->admission_date)) }} </span>
                                </td>
                                <td>
                                    <label>Class: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ Config::get('admin.class_array.'.$StudentsModel->class) }} </span>
                                </td>
                                <td>
                                    <label>Roll No: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ $StudentsModel->roll_no }} </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Shift: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 40px; padding-right: 40px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ Config::get('admin.shift_array.'.$StudentsModel->shift) }} </span>
                                </td>
                                <td colspan='3'>
                                    <label>Gender: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 30px; padding-right: 30px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ Config::get('admin.gender_array.'.$StudentsModel->gender) }} </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Father Information -->
                <tr>
                    <th>
                        <p style='margin: 10px; font-weight: bold;'>Father Information</p>
                    </th>
                </tr>
                <tr>
                    <td style='padding: 10px;'>
                        <table style='padding: 10px; border-collapse: collapse; width:100%;'>
                            <tr>
                                <td>
                                    <label>Name: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 30px; padding-right: 40px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ $StudentsModel->father_name }} </span>
                                </td>
                                <td>
                                    <label>CNIC: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ $StudentsModel->father_cnic }} </span>
                                </td>
                                <td colspan='2'>
                                    <label>Qualification: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ Config::get('admin.education_level_array.'.$StudentsModel->father_education) }} </span>
                                </td>
                            </tr>
                            <tr>
                                <td style='padding-top: 20px; padding-bottom: 10px;'>
                                    <label>Professional Status: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ Config::get('admin.professional_status_array.'.$StudentsModel->father_professional_status) }} </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Father Information -->
                <tr>
                    <th>
                        <p style='text-align: center; margin: 10px; font-weight: bold;'>Mother Information</p>
                    </th>
                </tr>
                <tr>
                    <td style='padding: 10px;'>
                        <table style='padding: 10px; border-collapse: collapse; width:100%;'>
                            <tr>
                                <td>
                                    <label>Name: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 30px; padding-right: 40px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ $StudentsModel->mother_name }} </span>
                                </td>
                                <td>
                                    <label>CNIC: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ $StudentsModel->mother_cnic }} </span>
                                </td>
                                <td>
                                    <label>Qualification: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ Config::get('admin.education_level_array.'.$StudentsModel->mother_education) }} </span>
                                </td>
                            </tr>
                            <tr>
                                <td style='padding-top: 20px; padding-bottom: 10px;'>
                                    <label>Professional Status: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ Config::get('admin.professional_status_array.'.$StudentsModel->mother_professional_status) }} </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>      

                <!-- General Information -->
                <tr>
                    <th>
                        <p style='text-align: center; margin: 10px; font-weight: bold;'>General Information</p>
                    </th>
                </tr>
                <tr>
                    <td style='padding: 10px;'>
                        <table style='padding: 10px; border-collapse: collapse; width:100%;'>
                            <tr>
                                <td colspan='3' style='width: 650px;'>
                                    <label>Permanent Address: </label><span style='display: inline-block; width: 450px; font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 30px; padding-right: 40px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ $StudentsModel->permanent_address }} </span>
                                </td>
                            </tr>
                            <tr>
                                <td style='padding-top: 20px;'>
                                    <label>Phone No: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ $StudentsModel->phone_no }} </span>
                                </td>
                                <td style='padding-top: 20px;'>
                                    <label>Cell No: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ $StudentsModel->cell_no }} </span>
                                </td>
                                <td style='padding-top: 20px;'>
                                    <label>Religion: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ Config::get('admin.religion_array.'.$StudentsModel->religion) }} </span>
                                </td>
                            </tr>
                            <tr>
                                <td style='padding-top: 20px;'>
                                    <label>No of Siblings: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ $StudentsModel->no_of_children }} </span>
                                </td>
                                <td style='padding-top: 20px;'>
                                    <label>Male: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ $StudentsModel->male }} </span>
                                </td>
                                <td style='padding-top: 20px;'>
                                    <label>Female: </label><span style='font-weight: bold; border-bottom: 1px solid black; text-align: center; padding-left: 20px; padding-right: 20px; font-size: 14px; padding-bottom: 5px; margin-left: 10px;'> {{ $StudentsModel->female }} </span>
                                </td>
                            </tr>
                            <tr>
                                <td style='padding-top: 20px;' colspan='3'>
                                    <label>Guardian Occupation: </label>
                                    <span class='fa @if($StudentsModel->guardian_occupation == 1) fa-check @endif' style="font-size: 11px; border-radius: 1px; margin-left: 20px; display: inline-block; width: 10px; height: 10px; border: 1px solid black;"></span> Driver
                                    <span class='fa @if($StudentsModel->guardian_occupation == 2) fa-check @endif' style="font-size: 11px; border-radius: 1px; margin-left: 20px; display: inline-block; width: 10px; height: 10px; border: 1px solid black;"></span> Electrician
                                    <span class='fa @if($StudentsModel->guardian_occupation == 3) fa-check @endif' style="font-size: 11px; border-radius: 1px; margin-left: 20px; display: inline-block; width: 10px; height: 10px; border: 1px solid black;"></span> Other
                                    <span class='fa @if($StudentsModel->guardian_occupation == 4) fa-check @endif' style="font-size: 11px; border-radius: 1px; margin-left: 20px; display: inline-block; width: 10px; height: 10px; border: 1px solid black;"></span> Not Laboured
                                </td>
                            </tr>
                            <tr>
                                <td style='padding-top: 20px;' colspan='3'>
                                    <label>Residential Status: </label>
                                    <span class='fa @if($StudentsModel->residential_status == 1) fa-check @endif' style="font-size: 11px; border-radius: 1px; margin-left: 38px; display: inline-block; width: 10px; height: 10px; border: 1px solid black;"></span> Self-Owned
                                    <span class='fa @if($StudentsModel->residential_status == 2) fa-check @endif' style="font-size: 11px; border-radius: 1px; margin-left: 20px; display: inline-block; width: 10px; height: 10px; border: 1px solid black;"></span> Rented
                                    <span class='fa @if($StudentsModel->residential_status == 3) fa-check @endif' style="font-size: 11px; border-radius: 1px; margin-left: 20px; display: inline-block; width: 10px; height: 10px; border: 1px solid black;"></span> Tent
                                </td>
                            </tr>
                            <tr>
                                <td style='padding-top: 20px;' colspan='3'>
                                    <label>Financial Status: </label>
                                    <span class='fa @if($StudentsModel->father_income == 1) fa-check @endif' style="font-size: 11px; border-radius: 1px; margin-left: 50px; display: inline-block; width: 10px; height: 10px; border: 1px solid black;"></span> NIL
                                    <span class='fa @if($StudentsModel->father_income == 2) fa-check @endif' style="font-size: 11px; border-radius: 1px; margin-left: 20px; display: inline-block; width: 10px; height: 10px; border: 1px solid black;"></span> Upto Rs. 10,000
                                    <span class='fa @if($StudentsModel->father_income == 3) fa-check @endif' style="font-size: 11px; border-radius: 1px; margin-left: 20px; display: inline-block; width: 10px; height: 10px; border: 1px solid black;"></span> Less Than Rs. 20,000
                                </td>
                            </tr>     
                            <tr>
                                <td style='padding-top: 20px;' colspan='3'>
                                    <label style='font-weight: bold;'>Terms and Conditions: </label>
                                    <ol>
                                        <li style='font-size: 12px;'>The student will be struck off if he/she will remain absent continuously for 3 days without intimation or 5 day in a month.</li>
                                        <li style='font-size: 12px;'>The student will not be readmitted, once he/she leaves the school in the same session</li>
                                        <li style='font-size: 12px;'>Once a student drops out in the middle of the session and applies for re-admission in the next then Aabroo management will<br>charge total fee @750/ per month from his/her Guarantor of his/her previous study tenure.</li>
                                    </ol>
                                </td>
                            </tr>                            
                        </table>
                    </td>
                </tr>    
                <tr>
                    <td>
                        <div style='padding: 5px;' class='pull-right'>Managed By: Aabroo Educational Welfare Organization &reg;</div>
                    </td>
                </tr>        
            </table>

        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.13/js/mdb.min.js"></script>
    </body>
</html>

