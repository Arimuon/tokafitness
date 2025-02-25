<?php
include('../functions.php');
page_starter();

?>

<div class="container my-5">
    <h1 class="mb-4">Cookie Policy</h1>

    <div class="card mb-4">
        <div class="card-body">
            <p class="lead">Last updated: <?= date('F Y') ?></p>

            <h2 class="h4 mb-3">What Are Cookies</h2>
            <p>Cookies are small text files stored on your device when you visit websites. We use only necessary cookies that are essential for the proper functioning of our website.</p>

            <h2 class="h4 mb-3 mt-4">Types of Cookies We Use</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Cookie Name</th>
                            <th>Purpose</th>
                            <th>Duration</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>cookie_notice</td>
                            <td>Stores your cookie consent preference</td>
                            <td>30 days</td>
                            <td>Strictly Necessary</td>
                        </tr>
                        <tr>
                            <td>PHPSESSID</td>
                            <td>Maintains user session state</td>
                            <td>Session</td>
                            <td>Strictly Necessary</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h2 class="h4 mb-3 mt-4">Managing Cookies</h2>
            <p>You can control cookies through your browser settings. However, disabling cookies may affect website functionality.</p>
            <ul>
                <li><a href="https://support.mozilla.org/en-US/kb/enable-and-disable-cookies-website-preferences" target="_blank">Firefox</a></li>
                <li><a href="https://support.google.com/chrome/answer/95647" target="_blank">Chrome</a></li>
                <li><a href="https://support.microsoft.com/en-gb/help/17442/windows-internet-explorer-delete-manage-cookies" target="_blank">Internet Explorer</a></li>
                <li><a href="https://support.apple.com/guide/safari/manage-cookies-and-website-data-sfri11471/mac" target="_blank">Safari</a></li>
            </ul>

            <h2 class="h4 mb-3 mt-4">Changes to This Policy</h2>
            <p>We may update this cookie policy. Significant changes will be notified through our website.</p>

            <div class="mt-4">
                <p class="text-muted small">This cookie policy was last updated on <?= date('j F Y') ?> and applies to citizens and legal permanent residents of the European Economic Area and Switzerland.</p>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="./" class="btn btn-primary">Back</a>
    </div>
</div>

<?php
page_end();
?>