<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Taylor Rogers">
        <meta name="description" content ="This allows for a donation to be
        made to the museum, it does not display prior donations">
        <link rel="icon" href="museumImageURL.png" type="image/x-icon">
        <link rel="stylesheet" href="donations.css" type="text/css">
        <title>Donations Page</title>
    </head>
    <body>
        <?php include 'header.php'; ?>  
        <main>
            <div id="donationform">
                <form action="https://httpbin.org/get" method="get">
                <!--At the moment i'm not really sure what to do with the action field. Eventually it'll insert the data here into the sql server right?-->
                    <fieldset>
                        <legend>Donation Form</legend>
                            <label for="firstName">First Name:</label>
                            <input type="text" name="firstName" id="firstName" placeholder="Ex: Jane" 
                            autocomplete="on" required autofocus><br><br>
                            <label for="lastName">Last Name:</label>
                            <input type="text" name="lastName" id="lastName" placeholder="Ex: Smith"
                            autocomplete="on" required><br><br>
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email"><br><br>
                            <label for="phone">Phone:</label>
                            <input type="tel" name="phone" id="phone" placeholder="2815558888"
                            pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required><br><br>
                            <!--Mailing/Billing Address-->
                            <label for="addressline1">Address (Line 1):</label>
                            <input type="text" name="addressline1" id="addressline1" autocomplete="on" required><br><br>
                            <label for="addressline2">Address (Line 1):</label>
                            <input type="text" name="addressline2" id="addressline2" autocomplete="on"><br><br>
                            <label for="zip">Postal/Zip Code:</label>
                            <input type="text" name="zip" id="zip" placeholder="Ex: 77204"
                            pattern="[0-9]{5}" required><br><br>
                            <label for="city">City:</label>
                            <input type="text" name="city" id="city" placeholder="Ex: Houston" autocomplete="on" required><br><br>
                            <label for="country">Country:</label>
                            <input type="text" name="country" id="country" placeholder="Ex: United States" autocomplete="on" required><br><br>
                            <label for="state">State:</label>
                            <input type="text" name="state" id="state" placeholder="If Applicable, Ex: TX"
                            autocomplete="on"><br><br>
                            <hr>
                            <label for="donationamt">Donation Amount (In USD):</label>
                            <input type="number" name="donationamt" id="donationamt" required><br><br>

                            <input type="checkbox" id="wantsEmail" name="wantsEmail" value="True">
                            <label>Would you like to receive emails from the Museum of Fine Arts?</label><br><br>

                            <input type="submit" value="Submit">
                            
                            <!--TODO: PHP form to submit donations, dates associated as a server side thing? a check box to inquire about newspaper subscription-->
                            <!--She said credit card stuff was superficial at best she didn't really want that i don't think-->
                            <!--I could add a drop down menu for states?-->
                    

                    </fieldset>
                </form>
            </div>
        </main>
    </body>

    

</html>
