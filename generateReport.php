<?php
session_start();
require_once "connection.php";
if (!$_SESSION['id']&&!$_SESSION['role'])
{
    header("Location:AcessDenied.php");
}
$sql = "SELECT * FROM affectedpeople";
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Pay Slip</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="css/style.css">


</head>
<style>
    body {
        background: #f0f0f0;
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        padding: 20px;
        height: 100%;
    }

    @import url('https://fonts.googleapis.com/css?family=Roboto:200,300,400,600,700');

    * {
        font-family: 'Roboto', sans-serif;
        font-size: 12px;
        color: #444;
    }

    #payslip {
        width: calc( 8.5in - 80px );
        height: calc( 11in - 60px );
        background: #fff;
        padding: 30px 40px;
    }

    #title {
        margin-bottom: 20px;
        font-size: 38px;
        font-weight: 600;
    }

    #scope {
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        padding: 7px 0 4px 0;
        display: flex;
        justify-content: space-around;
    }

    #scope > .scope-entry {
        text-align: center;
    }

    #scope > .scope-entry > .value {
        font-size: 14px;
        font-weight: 700;
    }

    .content {
        display: flex;
        border-bottom: 1px solid #ccc;
        height: 880px;
    }

    .content .left-panel {
        border-right: 1px solid #ccc;
        min-width: 200px;
        padding: 20px 16px 0 0;
    }

    .content .right-panel {
        width: 100%;
        padding: 10px 0  0 16px;
    }

    #employee {
        text-align: center;
        margin-bottom: 20px;
    }
    #employee #name {
        font-size: 15px;
        font-weight: 700;
    }

    #employee #email {
        font-size: 11px;
        font-weight: 300;
    }

    .details, .contributions, .ytd, .gross {
        margin-bottom: 20px;
    }

    .details .entry, .contributions .entry, .ytd .entry {
        display: flex;
        justify-content: space-between;
        margin-bottom: 6px;
    }

    .details .entry .value, .contributions .entry .value, .ytd .entry .value {
        font-weight: 700;
        max-width: 130px;
        text-align: right;
    }

    .gross .entry .value {
        font-weight: 700;
        text-align: right;
        font-size: 16px;
    }

    .contributions .title, .ytd .title, .gross .title {
        font-size: 15px;
        font-weight: 700;
        border-bottom: 1px solid #ccc;
        padding-bottom: 4px;
        margin-bottom: 6px;
    }

    .content .right-panel .details {
        width: 100%;
    }

    .content .right-panel .details .entry {
        display: flex;
        padding: 0 10px;
        margin: 6px 0;
    }

    .content .right-panel .details .label {
        font-weight: 700;
        width: 120px;
    }

    .content .right-panel .details .detail {
        font-weight: 600;
        width: 130px;
    }

    .content .right-panel .details .rate {
        font-weight: 400;
        width: 80px;
        font-style: italic;
        letter-spacing: 1px;
    }

    .content .right-panel .details .amount {
        text-align: right;
        font-weight: 700;
        width: 90px;
    }

    .content .right-panel .details .net_pay div, .content .right-panel .details .nti div {
        font-weight: 600;
        font-size: 12px;
    }

    .content .right-panel .details .net_pay, .content .right-panel .details .nti {
        padding: 3px 0 2px 0;
        margin-bottom: 10px;
        background: rgba(0, 0, 0, 0.04);
    }
</style>
<body>

<div id="payslip">
    <div id="title">Payslip</div>
    <div id="scope">
        <div class="scope-entry">
            <div class="title">PAY RUN</div>
            <div class="value"><?=date('Y-m-d l')?> </div>
        </div>
        <div class="scope-entry">
            <div class="title">PAY PERIOD</div>
            <div class="value"><?=date('F-01')?> - <?=date('F-t,Y')?></div>
        </div>
    </div>
    <div class="content">
        <div class="left-panel">
            <div id="employee">
                <div id="name">
                    <span> <?=$empsalary->emp_name ?></span>
                </div>
                <div id="email">
                    <span> <?=$empsalary->emp_email ?></span>
                </div>
            </div>
            <div class="details">
                <div class="entry">
                    <div class="label">Employee ID</div>
                    <div class="value"><span> <?=$empsalary->emp_id ?></span></div>
                </div>
                <div class="entry">
                    <div class="label">Tax Status</div>
                    <div class="value">Option nai</div>
                </div>
                <div class="entry">
                    <div class="label">Hourly Rate</div>
                    <div class="value"><?php if(($worktime->jobtypes)==2):?>
                            <?= "calculation baki"?>
                        <?php endif;?></div>
                </div>
                <div class="entry">
                    <div class="label">Company Name</div>
                    <div class="value"><?= "Astha IT solutions"?></div>
                </div>
                <div class="entry">
                    <div class="label">Date Hired</div>
                    <div class="value"><?=$empsalary->emp_joining_date ?></div>
                </div>
                <div class="entry">
                    <div class="label">Position</div>
                    <div class="value"><?= $empsalary->emp_designation?></div>
                </div>
                <div class="entry">
                    <div class="label">Department</div>
                    <div class="value"><?= $empsalary->emp_department?></div>
                </div>
                <div class="entry">
                    <div class="label">Skill</div>
                    <div class="value"><?= $empsalary->emp_skills_record?></div>
                </div>
                <div class="entry">
                    <div class="label">Job Type</div>
                    <div class="value"><?= $worktime->jobtypes?></div>
                </div>
                <div class="entry">
                    <div class="label">Bank Name</div>
                    <div class="value"><?= $empsalary->emp_bank_name?></div>
                </div>
                <div class="entry">
                    <div class="label">Bank Account</div>
                    <div class="value"><?= $empsalary->emp_bank_account?></div>
                </div>
                <div class="entry">
                    <div class="label">Phone</div>
                    <div class="value"><?= $empsalary->emp_local_contact_number?></div>
                </div>
                <div class="entry">
                    <div class="label">Emergency Number</div>
                    <div class="value"><?= $empsalary->emp_emergency_cn?></div>
                </div>
                <div class="entry">
                    <div class="label"></div>
                    <div class="value">12-312312312-3</div>
                </div>
                <div class="entry">
                    <div class="label">Last Promotion</div>
                    <div class="value"><?= $empsalary->created_at?></div>
                </div>
            </div>
            <div class="gross">
                <div class="title">Gross Income</div>
                <div class="entry">
                    <div class="label"></div>
                    <div class="value"><?=$empsalary->emp_basic_salary + $empsalary->emp_allowances?></div>
                </div>
            </div>
            <div class="contributions">
                <div class="title">Employer Contribution</div>
                <div class="entry">
                    <div class="label">Work Time Limit(weekly)</div>
                    <div class="value"><?=$worktime->worktimelimit?></div>
                </div>
                <div class="entry">
                    <div class="label">Total Work Hours</div>
                    <?php
                    $h = floor($totalwork->totalwork/3600);

                    $m = floor($totalwork->totalwork-(3600*$h))/60;

                    $s = floor($totalwork->totalwork -(3600*$h)-($m*60));

                    ?>
                    <div class="value"><?=$h?></div>
                </div>
                <div class="entry">
                    <div class="label">Total Over Time</div>
                    <div class="value">
                        <?php if($h>($worktime->worktimelimit)):?>
                            <?= $h-($worktime->worktimelimit)?>
                        <?php endif ?>
                        <?php if($h<($worktime->worktimelimit)):?>
                            <?= "0"?>
                        <?php endif ?>

                    </div>
                </div>
                <div class="entry">
                    <div class="label">Employee Nomination</div>
                    <div class="value"><?=$empsalary->emp_nomination?></div>
                </div>
            </div>
            <div class="ytd">
                <div class="title">Year To Date Figures</div>
                <div class="entry">
                    <div class="label">Gross Income</div>
                    <div class="value"><?=$empsalary->emp_basic_salary + $empsalary->emp_allowances?></div>
                </div>
                <div class="entry">
                    <div class="label">Taxable Income</div>
                    <?php $income=($empsalary->emp_basic_salary + $empsalary->emp_allowances)-$loan->emp_deduction_loan_monthly?>
                    <div class="value"><?=($empsalary->emp_basic_salary + $empsalary->emp_allowances)-$loan->emp_deduction_loan_monthly?></div>
                </div>
                <div class="entry">
                    <div class="label">Withholding Tax(5%)</div>
                    <?php $tax=5*(($empsalary->emp_basic_salary + $empsalary->emp_allowances)-$loan->emp_deduction_loan_monthly)/100?>
                    <div class="value"><?=5*(($empsalary->emp_basic_salary + $empsalary->emp_allowances)-$loan->emp_deduction_loan_monthly)/100?></div>
                </div>
                <div class="entry">
                    <div class="label">Net Pay</div>
                    <div class="value"><?=$income-$tax?></div>
                </div>
                <div class="entry">
                    <div class="label">Allowance</div>
                    <div class="value"><?=$empsalary->emp_allowances?></div>
                </div>
                <div class="entry">
                    <div class="label">Bonus</div>
                    <div class="value">0</div>
                </div>
                <div class="entry">
                    <div class="label">Commission</div>
                    <div class="value">0</div>
                </div>
                <div class="entry">
                    <div class="label">Deduction</div>
                    <div class="value"><?= $loan->emp_deduction_loan_monthly?></div>
                </div>

            </div>
        </div>
        <div class="right-panel">
            <div class="details">
                <div class="basic-pay">
                    <div class="entry">
                        <div class="label">Basic Pay</div>
                        <div class="detail"></div>
                        <div class="rate"><?=$empsalary->emp_basic_salary?>/Month</div>
                        <div class="amount"><?=$empsalary->emp_basic_salary?></div>
                    </div>
                </div>
                <div class="salary">
                    <div class="entry">
                        <div class="label">Salary</div>
                        <div class="detail"></div>
                        <div class="rate"></div>
                        <div class="amount"></div>
                    </div>
                    <div class="entry">
                        <div class="label"></div>
                        <div class="detail">Undertime</div>
                        <div class="rate">
                            <?php if($h<($worktime->worktimelimit)):?>
                                <?= $h-($worktime->worktimelimit)."h"?>
                            <?php endif ?>
                            <?php if($h>($worktime->worktimelimit)):?>
                                <?= "0h"?>
                            <?php endif ?>
                            259.00/hr</div>
                        <div class="amount"><?php if($h<($worktime->worktimelimit)):?>
                                <span style="background-color: deeppink"><?= abs($h-($worktime->worktimelimit))*259.00?></span>
                            <?php endif ?>
                            <?php if($h>($worktime->worktimelimit)):?>
                                <?= "0"?>
                            <?php endif ?></div>
                    </div>
                    <div class="entry">
                        <div class="label"></div>
                        <div class="detail">Overtime</div>
                        <div class="rate"><?php if($h>($worktime->worktimelimit)):?>
                                <?= $h-($worktime->worktimelimit)?>
                            <?php endif ?>
                            <?php if($h<($worktime->worktimelimit)):?>
                                <?= "0h"?>
                            <?php endif ?>500.00/hr</div>
                        <div class="amount">
                            <?php if($h>($worktime->worktimelimit)):?>
                                <?= $h-($worktime->worktimelimit)*500.00?>
                            <?php endif ?>
                            <?php if($h<($worktime->worktimelimit)):?>
                                <?= "0"?>
                            <?php endif ?>
                        </div>
                    </div>
                    <!--                    <div class="entry">-->
                    <!--                        <div class="label"></div>-->
                    <!--                        <div class="detail">Regular Holiday Regular Holiday</div>-->
                    <!--                        <div class="rate">9hrs@778.85/hr</div>-->
                    <!--                        <div class="amount">7,009.65</div>-->
                    <!--                    </div>-->
                    <!--                    <div class="entry">-->
                    <!--                        <div class="label"></div>-->
                    <!--                        <div class="detail">Regular Holiday Regular Holiday Night</div>-->
                    <!--                        <div class="rate">7hrs@856.73/hr</div>-->
                    <!--                        <div class="amount">5,997.11</div>-->
                    <!--                    </div>-->
                    <!--                    <div class="entry">-->
                    <!--                        <div class="label"></div>-->
                    <!--                        <div class="detail">Night</div>-->
                    <!--                        <div class="rate">56hrs@285.582/hr</div>-->
                    <!--                        <div class="amount">15,992.59</div>-->
                    <!--                    </div>-->
                    <!--                    <div class="entry">-->
                    <!--                        <div class="label"></div>-->
                    <!--                        <div class="detail">Regular Holiday</div>-->
                    <!--                        <div class="rate">9hrs@519.23/hr</div>-->
                    <!--                        <div class="amount">4,673.07</div>-->
                    <!--                    </div>-->
                    <!--                    <div class="entry">-->
                    <!--                        <div class="label"></div>-->
                    <!--                        <div class="detail">Regular Holiday Night</div>-->
                    <!--                        <div class="rate">7hrs@571.15/hr</div>-->
                    <!--                        <div class="amount">3,998.05</div>-->
                    <!--                    </div>-->
                    <!--                    <div class="entry">-->
                    <!--                        <div class="label"></div>-->
                    <!--                        <div class="detail">Regular Holiday Night Overtime</div>-->
                    <!--                        <div class="rate">2hrs@742.50/hr</div>-->
                    <!--                        <div class="amount">1,485.00</div>-->
                    <!--                    </div>-->
                    <!--                    <div class="entry">-->
                    <!--                        <div class="label"></div>-->
                    <!--                        <div class="detail">Special Holiday</div>-->
                    <!--                        <div class="rate">9hrs@337.50/hr</div>-->
                    <!--                        <div class="amount">3,037.50</div>-->
                    <!--                    </div>-->
                    <!--                    <div class="entry">-->
                    <!--                        <div class="label"></div>-->
                    <!--                        <div class="detail">Special Holiday Night</div>-->
                    <!--                        <div class="rate">7hrs@371.25/hr</div>-->
                    <!--                        <div class="amount">2,598.75</div>-->
                    <!--                    </div>-->
                    <!--                    <div class="entry">-->
                    <!--                        <div class="label"></div>-->
                    <!--                        <div class="detail">Rest Day</div>-->
                    <!--                        <div class="rate">8hrs@337.50/hr</div>-->
                    <!--                        <div class="amount">2,700.00</div>-->
                    <!--                    </div>-->
                </div>
                <div class="leaves">
                    <div class="entry">
                        <div class="label">Leaves</div>
                        <div class="detail"></div>
                        <div class="rate"></div>
                        <div class="amount"></div>
                    </div>
                    <div class="entry paid">
                        <div class="label"></div>
                        <div class="detail">Paid Leave</div>
                        <div class="amount"><?=$paidleave->paidleave?></div>
                    </div>
                    <div class="entry unpaid">
                        <div class="label"></div>
                        <div class="detail">Unpaid Leave</div>
                        <div class="amount"><?=$unpaidleave->unpaidleave?></div>
                    </div>
                </div>
                <div class="taxable_allowance">
                    <div class="entry">
                        <div class="label">Taxable Allowance</div>
                        <div class="detail"></div>
                        <div class="rate"></div>
                        <div class="amount"></div>
                    </div>
                    <div class="entry">
                        <div class="label"></div>
                        <div class="detail">Allowance Name</div>
                        <div class="rate"></div>
                        <div class="amount"><?=$empsalary->emp_allowances?></div>
                    </div>
                </div>
                <div class="taxable_bonus">
                    <div class="entry">
                        <div class="label">Taxable Bonus</div>
                        <div class="detail"></div>
                        <div class="rate"></div>
                        <div class="amount"></div>
                    </div>
                    <div class="entry">
                        <div class="label"></div>
                        <div class="detail">Bonus Name</div>
                        <div class="rate"></div>
                        <div class="amount">0</div>
                    </div>
                </div>
                <div class="taxable_commission"></div>
                <div class="contributions">
                    <div class="entry">
                        <div class="label">Contributions</div>
                        <div class="detail"></div>
                        <div class="rate"></div>
                        <div class="amount"></div>
                    </div>
                    <div class="entry">
                        <div class="label"></div>
                        <div class="detail">Mobile bil</div>
                        <div class="rate"></div>
                        <?php $mobilebill=1001?>
                        <div class="amount"><?=$mobilebill?></div>
                    </div>
                    <!--                    <div class="entry">-->
                    <!--                        <div class="label"></div>-->
                    <!--                        <div class="detail">HDMF</div>-->
                    <!--                        <div class="rate"></div>-->
                    <!--                        <div class="amount">(100.00)</div>-->
                    <!--                    </div>-->
                    <!--                    <div class="entry">-->
                    <!--                        <div class="label"></div>-->
                    <!--                        <div class="detail">PhilHealth</div>-->
                    <!--                        <div class="rate"></div>-->
                    <!--                        <div class="amount">(437.50)</div>-->
                    <!--                    </div>-->
                </div>
                <div class="nti">
                    <div class="entry">
                        <div class="label">TAXABLE INCOME</div>
                        <div class="detail"></div>
                        <div class="rate">after loan deduction</div>
                        <div class="amount"><?=$income?></div>
                    </div>
                </div>
                <div class="withholding_tax">
                    <div class="entry">
                        <div class="label">Withholding Tax</div>
                        <div class="detail"></div>
                        <div class="rate"></div>
                        <div class="amount"><?=$tax?></div>
                    </div>
                </div>
                <div class="non_taxable_allowance">
                    <div class="entry">
                        <div class="label">Non-Taxable Allowance</div>
                        <div class="detail"></div>
                        <div class="rate"></div>
                        <div class="amount"></div>
                    </div>
                    <div class="entry">
                        <div class="label"></div>
                        <div class="detail">Allowance Name</div>
                        <div class="rate"></div>
                        <div class="amount"><?=$empsalary->emp_allowances?></div>
                    </div>
                </div>
                <div class="non_taxable_bonus">
                    <div class="entry">
                        <div class="label">Non-Taxable Bonus</div>
                        <div class="detail"></div>
                        <div class="rate"></div>
                        <div class="amount"></div>
                    </div>
                    <div class="entry">
                        <div class="label"></div>
                        <div class="detail">Bonus Name</div>
                        <div class="rate"></div>
                        <div class="amount">None</div>
                    </div>
                </div>
                <div class="non_taxable_commission">
                    <div class="entry">
                        <div class="label">Non-Taxable Commission</div>
                        <div class="detail"></div>
                        <div class="rate"></div>
                        <div class="amount"></div>
                    </div>
                    <div class="entry">
                        <div class="label"></div>
                        <div class="detail">Commission Name 1</div>
                        <div class="rate"></div>
                        <div class="amount">None</div>
                    </div>
                    <div class="entry">
                        <div class="label"></div>
                        <div class="detail">Commission Name 2</div>
                        <div class="rate"></div>
                        <div class="amount">None</div>
                    </div>
                </div>
                <div class="deductions">
                    <div class="entry">
                        <div class="label">Deductions</div>
                        <div class="detail"></div>
                        <div class="rate"></div>
                        <div class="amount"></div>
                    </div>
                    <div class="entry">
                        <div class="label"></div>
                        <div class="detail">Under Time</div>
                        <div class="rate"></div>
                        <div class="amount"><?php if ($h<($worktime->worktimelimit)):?>
                                <span style="background-color: hotpink"> <?="-".$income?> </span>
                            <?php endif ?>
                            <?php if ($h>($worktime->worktimelimit)):?>
                                <?="None"?>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
                <div class="net_pay">
                    <div class="entry">
                        <div class="label">NET PAY</div>
                        <div class="detail"></div>
                        <div class="rate"></div>
                        <div class="amount"><?php if($h<($worktime->worktimelimit)):?>
                                <?php $underpay=abs($h-$worktime->worktimelimit)*259.00?>
                                <span style="background-color: hotpink"><?=$underpay+($empsalary->emp_allowances)?> </span>
                            <?php endif ?>

                            <?php if($h>($worktime->worktimelimit)):?>
                                <?=$h-($worktime->worktimelimit)*500.00+($income-$tax) ?>
                            <?php endif ?></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



</body>

</html>
