<nav class="nav-primary hidden-xs">
    <ul class="nav">
        <li <?php echo isset($expense) ? $expense : ""; ?>>
            <a href="expense.php">
                <i class="fa fa-money"></i>
                <span>Expense Entry</span>
            </a>
        </li>
        <li <?php echo isset($statement) ? $statement : ""; ?>>
            <a href="statement.php">
                <i class="fa fa-paperclip"></i>
                <span>Statement</span>
            </a>
        </li>
        <li <?php echo isset($rnr) ? $rnr : ""; ?>>
            <a href="rnr.php">
                <i class="fa fa-dashboard"></i>
                <span>My Summary</span>
            </a>
        </li>
        <li <?php echo isset($heads) ? $heads : ""; ?>>
            <a href="heads.php">
                <i class="fa fa-tag"></i>
                <span>Expense Heads</span>
            </a>
        </li>
        <li <?php echo isset($staff) ? $staff : ""; ?>>
            <a href="staff.php">
                <i class="fa fa-users"></i>
                <span>Staff</span>
            </a>
        </li>
        <li <?php echo isset($office) ? $office : ""; ?>>
            <a href="office.php">
                <i class="fa fa-star"></i>
                <span>खर्चा (Vikram)</span>
            </a>
        </li>
        <li <?php echo isset($uncategorised) ? $uncategorised : ""; ?>>
            <a href="uncategorized.php">
                <i class="fa fa-bell-o"></i>
                <span>Uncategorised</span>
            </a>
        </li>
        <li <?php echo isset($bank) ? $bank : ""; ?> class="dropdown-submenu">
            <a href="bank.php" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-building-o"></i>
                <span>Bank</span>
            </a>
            <ul class="dropdown-menu">   
                <li>
                    <a href="hdfc.php">HDFC</a>
                </li>
                <li>
                    <a href="loans.php">SPB</a>                    
                </li>
                <li>
                    <a href="dashboard-2.html">AXIS</a>
                </li>
                <li>
                    <a href="analysis.html">HDFC RIPE GLOBAL</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>