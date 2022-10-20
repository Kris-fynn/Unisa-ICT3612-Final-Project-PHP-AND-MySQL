<!DOCTYPE html>
<html>
<body>
<h1>Task 5</h1>

<h2>Database Tables</h2>

<ul>
    <li>vendors - Suppliers of the products that the company sells</li>
    <li>invoices - Invoice header records, contains the dates, payment terms and supplier id (purchase orders)</li>
    <li>InvoiceLineItems - Invoice detail records, links to the products accounts, and descriptions</li>
    <li>terms - Describes payment terms for suppliers and invoices.</li>
    <li>generalLedgerAccounts - Accounting records for the suppliers (accounts payable)</li>
</ul>

<h3>vendors</h3>

<ul>
    <li>vendorID - Primary key</li>
    <li>defaultTermsID - Foreign key for terms</li>
    <li>defaultAccountNo - Foreign key for generalLedgerAccounts</li>
</ul>

<h3>invoices</h3>

<ul>
    <li>invoiceID - Primary key</li>
    <li>vendorID - Foreign key for vendors</li>
    <li>termsID - Foreign key for terms</li>
</ul>

<h3>invoiceLineItems</h3>

<ul>
    <li>invoiceID, InvoiceSequence - Composite primary key</li>
    <li>accountNo - foreign key for generalLedgerAccounts</li>
</ul>

<h3>terms</h3>

<ul>
    <li>termsID - primary key</li>
</ul>

<h4>generalLedgerAccounts</h4>

<ul>
    <li>accountNo - primary key</li>
</ul>

<br>
<br>

</body>
</html>










