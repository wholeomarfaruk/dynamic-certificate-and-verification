<?php
include "header.php";
?>
<?php
$dataStatus = false;
$company = [];
$student = [];
$studentCount = 0;
if (
  isset($_GET['reg']) && isset($_GET['roll']) &&
  !empty($_GET['reg']) && !empty($_GET['roll'])
) {
  $reg = htmlspecialchars($_GET['reg']);
  $roll = htmlspecialchars($_GET['roll']);

  $companyData = mysqli_query($db, "SELECT * FROM certificate ");

  while ($row = mysqli_fetch_assoc($companyData)) {
    $company[$row['name']] = $row['value'];
  }

  $studentData = mysqli_query($db, "SELECT * FROM students WHERE roll_no='$roll' AND reg_no='$reg' AND status=1");
  $studentCount = mysqli_num_rows($studentData);

  while ($row = mysqli_fetch_assoc($studentData)) {
    $student = $row;
  }
  $written = (float) (isset($student['written_mark'])) ? htmlspecialchars($student['written_mark']) : 0;
  $practical = (float) (isset($student['practical_mark'])) ? htmlspecialchars($student['practical_mark']) : 0;
  $viva = (float) (isset($student['viva_mark'])) ? htmlspecialchars($student['viva_mark']) : 0;
  $total_sum = $written + $practical + $viva;
  // echo "<pre>";
  $dataStatus = true;
  // print_r($student);
  // print_r($company);

  function MMYYYY($date){
    if(!empty($date)){
      $dates = new DateTime($date);
      $result = $dates->format('d-M-Y');
      return $result;
    }
    return '';
  }
}
?>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

  body {
    padding: 10px;
    font-family: "Poppins", sans-serif;
  }

  body p {
    color: black;
  }

  section {
    border: 1px solid #b2b2b2;
    padding: 20px;
    background-color: #f9f9f9;
    /* Subtle background for distinction */
  }

  .logo {
    width: 100%;
    /* Full width in its column for better responsiveness */
    max-width: 150px;
    /* Limit maximum width */
  }

  .avatar {
    min-width: 180px;
    height: 200px;
    margin: 0 auto;
  }

  . .title,
  .text {
    font-weight: 500;
  }

  .table th,
  .table td {
    color: black;
    vertical-align: middle;
  }

  .mark-table th,
  .mark-table td {
    text-align: center;
  }

  .govtlicense {
    font-family: "Poppins", sans-serif;
  }

  .main-company {
    font-family: 'Times New Roman', Times, serif;
  }

  /* Responsive */
  @media (max-width: 768px) {

    .logo,
    .avatar {
      width: 5rem;
      /* Adjust width on smaller screens */
    }

    h1,
    h3,
    h5 {
      font-size: large;
    }

    .avatar {
      min-width: 100%;
      height: 100%;
      margin: 0;
    }

    .main-company {
    font-size: 5.5vw;
    margin-bottom: 0;
    line-height: 1.5rem;
}

    .profile-image-course .row {
      flex-direction: row-reverse;
      justify-content: space-between;

      -webkit-box-align: start !important;
      -webkit-align-items: start !important;
      -ms-flex-align: start !important;
      align-items: start !important;
    }

    .profile-image-course .row>.col-3.l {
      display: none;
      width: 0;
    }

    .profile-image-course .row>.col-6.m {
      max-width: 100%;
      padding-left: 3px;
      padding-right: 0px;
      text-align: left;
      width: 70%;
      flex: 0 0 70%;
      display: grid;
    }

    .profile-image-course .row>.col-3.r {
      max-width: 30%;
      flex: 0 0 30%;
      width: 30%;
    }
  

  .profile-image-course .row>.col-6.m h3,
  .profile-image-course .row>.col-6.m h5,
  .profile-image-course .row>.col-6.m p {
    text-align: left;
  }

  .profile-image-course .row>.col-6.m h5 {
    font-size: 5vw;
    order: 1;
    margin-bottom: 0 !important;
  }

  .profile-image-course .row>.col-6.m h3 {
    font-size: 4vw;
    font-weight: 500;
    order: 2;
    margin-bottom: 0 !important;
  }

  .profile-image-course .row>.col-6.m p {
    order: 3;
    margin-bottom: 0 !important;
  }
  .personaltable{}
  .personaltable tr{
    display: flex;
    flex-wrap: wrap;
  }
  .personaltable tr td{
    background-color: #dfdfdf;
    width: 50%;
    flex: 0 0 50%;
    
  }
  .personaltable tr td:nth-child(1),.personaltable tr td:nth-child(2){
    /* border-radius: 12px; */
    overflow: hidden;
    border: none;
    border-bottom: 1px solid #fff;
  }
  .personaltable tr td:nth-child(3),.personaltable tr td:nth-child(4){
    /* border-radius: 12px; */
    overflow: hidden;
    border: none;
    border-bottom: 1px solid #fff;
  }
  .personaltable tr td:nth-child(1),  .personaltable tr td:nth-child(3){

    font-weight: 700;
  }
  .table-bordered thead th, .table-bordered thead td{
    border-bottom-width:0 ;
  }
  .table thead th,.table-bordered th, .table-bordered td{
    border: 0;
  }
  .markstable{
    display: flex;
    border-bottom-width:0 ;
    border: none !important;
  }
  .markstable thead,.markstable tbody{
    background-color: #dfdfdf;
    flex: 0 0 50%;
    border: none;
  
  }
  .markstable thead tr,.markstable tbody tr{
    display: flex;
    flex-direction: column;
    flex: 0 0 50%;
    border: none !important;
    border-bottom-width:0 ;
  }
  .markstable thead tr th,.markstable tbody tr td{
    overflow: hidden;
    border: none !important;
    border-bottom-width:0 ;
    border-bottom: 1px solid #fff !important;
    text-align: left;
  }


}

  /* Responsive */
  @media (max-width: 360px) {

    
  }

  @media print {
    @page {
      size: landscape;
      margin: 10mm;
    }
  }
</style>

<section class="mt-3 p-3">
  <?php
  if ($dataStatus == true && $studentCount == 1) {
    ?>

    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-md-3 text-center">
          <img class="logo" src="images/logo.jpg" alt="Training Center Logo" />
        </div>
        <div class="col-md-6 text-center">
          <h1 class="title main-company mb-md-1">
            <?php echo (isset($company['institute_name'])) ? htmlspecialchars($company['institute_name']) : ''; ?></h1>
          <p class="govtlicense">Govt. License No:
            <?php echo (isset($company['license_no'])) ? htmlspecialchars($company['license_no']) : ''; ?></p>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>

    <div class="container-fluid profile-image-course">
      <div class="row align-items-center justify-content-evenly ">
        <div class="l col-3"></div>
        <div class="m col-6 text-center">
          <h3 class="text mb-2">
            <?php echo (isset($student['institute_name'])) ? htmlspecialchars($student['institute_name']) : ''; ?></h3>
          <h5 style="">
            <?php echo (isset($student['course_name'])) ? htmlspecialchars($student['course_name']) : ''; ?></h5>
          <p>Centre Code:
            <?php echo (isset($student['institute_code'])) ? htmlspecialchars($student['institute_code']) : ''; ?></p>
        </div>
        <div class="r col-3 text-center mb-3">
          <img style="" class="avatar img-thumbnail"
            src="upload/student/<?php echo (isset($student['photo'])) ? htmlspecialchars($student['photo']) : ''; ?>"
            alt="Student Photo" />
        </div>
      </div>
    </div>
    <div class="px-3 d-md-none">
      <h4 class="tabletitle mb-0">Student Details</h4>
    </div>
    <div class="container-fluid">
      <table class="personaltable table table-bordered ">
        <tbody>
          <tr>
            <td>Name</td>
            <td><?php echo (isset($student['full_name'])) ? htmlspecialchars($student['full_name']) : ''; ?></td>
            <td>Roll</td>
            <td><?php echo (isset($student['roll_no'])) ? htmlspecialchars($student['roll_no']) : ''; ?></td>
          </tr>
          <tr>
            <td>Father's Name</td>
            <td><?php echo (isset($student['father_name'])) ? htmlspecialchars($student['father_name']) : ''; ?></td>
            <td>Registration Number</td>
            <td><?php echo (isset($student['reg_no'])) ? htmlspecialchars($student['reg_no']) : ''; ?></td>
          </tr>
          <tr>
            <td>Mother's Name</td>
            <td><?php echo (isset($student['mother_name'])) ? htmlspecialchars($student['mother_name']) : ''; ?></td>
            <td>Session</td>
            <td><?php echo (isset($student['session_start'])) ? MMYYYY($student['session_start'] ): ''; ?> to
              <?php echo (isset($student['session_end'])) ? MMYYYY($student['session_end'] ) : ''; ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="px-3">
      <h4 class="tabletitle text-md-center mb-0 mb-md-2">Marks</h4>
    </div>

    <div class="container-fluid text-center">
      <table class="markstable table table-bordered mark-table">
        <thead>
          <tr>
            <th>Written</th>
            <th>Practical</th>
            <th>Viva</th>
            <th>Total</th>
            <th>Full Mark</th>
            <th>Grade</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo (isset($student['written_mark'])) ? htmlspecialchars($student['written_mark']) : ''; ?></td>
            <td><?php echo (isset($student['practical_mark'])) ? htmlspecialchars($student['practical_mark']) : ''; ?>
            </td>
            <td><?php echo (isset($student['viva_mark'])) ? htmlspecialchars($student['viva_mark']) : ''; ?></td>
            <td><?php echo $total_sum; ?></td>
            <td><?php echo (isset($student['total_mark'])) ? htmlspecialchars($student['total_mark']) : ''; ?></td>
            <td><?php echo (isset($student['grade'])) ? htmlspecialchars($student['grade']) : ''; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <?php

  } else {
    echo '<div class="container-fluid"><div class="alert alert-danger text-center" role="alert">
  Data not found
</div></div>';
  }
  ?>

</section>

<?php
include "footer.php";
?>