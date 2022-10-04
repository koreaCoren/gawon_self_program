<?php
$obj = new stdClass;
 $obj->name="홍길동";
 $obj->age=21;

// print_r($obj);
// echo "<br>";


$arr=[array("name"=>"Deepak"), array("age"=>21), array("marks"=>75), array("marrige"=>1), array("credit"=>1000)];
$test = JSON_encode($arr);
// print $test . "<br>";
// $obj2=(object)$arr;
// print_r($obj2);
// echo "<br>" . $obj2->name;

$decoding = json_decode($test);
// print $decoding[0]->name ."<br>";
$br = "<br>";
count($decoding);

$key = ['name', 'age', 'marks'];

for($i=0; $i< count($decoding); $i++){
  foreach ($decoding[$i] as $key => $value) {
    // echo $key . $value . $br;
  }
}

$sql = "INSERT INTO test (gen, phone, con, marr, credit) VALUES (";

$val = [];

for($i=0; $i< count($decoding); $i++){
  foreach ($decoding[$i] as $value) {
    // echo $value . $br;
    array_push($val, $value);

    print_r ($val);
    echo $br;
    if($i === count($decoding)-1){

      $sql .= $val[$i];
    }else{
      $sql .= $val[$i] . ",";

    }
    
  }
}
$sql .= ")";

echo $sql;

  // header("Content-charset=utf-8");
  // header('Content-Type: doesn/matter');
  // header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
  // header('Content-Disposition: attachment; filename="orderlist-' . date("ymd", time()) . '.csv"');
  // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
  // header('Pragma: public');

  // echo iconv('utf-8', 'euc-kr', "번호,작성일,성별,휴대번호,동의여부,혼인유무,채권자수,채무액(무담보),채무액(담보),거주형태,자가-부동산 실소유자,자가-부동산 
  // 시세,전월세-계약자,전월세-보증금,월세,전월세-담보대출금액,차량소유,차량시세, 수입형태, 4대보험 가입, 월평균 실수령액, 사업종류, 미납국세, 미납건강/연금보험, 
  // 전년도 매출액, 전년도 영업이익, 프리-직업, 프리-월평균 수입\n");
  // echo iconv('utf-8', 'euc-kr', "번호,성별,휴대번호,동의여부,혼인유무,채권자수,채무액(무담보),채무액(담보),거주형태,자가-부동산 실소유자,자가-부동산 시세,전월세-계약자,전월세-보증금,월세,전월세-담보대출금액,차량소유,차량시세, 수입형태, 4대보험 가입, 월평균 실수령액, 사업종류, 미납국세, 미납건강/연금보험, 전년도 매출액, 전년도 영업이익, 프리-직업, 프리-월평균 수입\n");



