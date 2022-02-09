<?php
   

?>
<!DOCTYPE html>
<body>  
    <div style="max-width:600px;padding-top:64px;padding-bottom:64px;text-align:center;margin-left:auto;margin-right:auto;display:block;font-size:20px;line-height:1.5">
        
        <img src="https://www.golinks.io/d/images/logos/golinks-logo-2021-dark.svg"/><br><br>
        <strong>Language:</strong><br>
         PHP <br><br>
         <strong>PHP Wrapper:</strong><br>
         PHP Curl Class<br>
         https://github.com/php-curl-class/php-curl-class<br><br>

         <strong>Endpoint:</strong><br>
         https://golinkstest.herokuapp.com/getContributors.php?org={org}&page={page number}<br><br>

        {org} & {page number} are required.<br><br>
        
        Each request pulls 25 items per page.<br><br>

        Response example:<br> 
        [{<br>
                    "username":"KevFullstack",<br>
                    "image_url":"https://avatars.githubusercontent.com/u/97488279?v=4",<br>
                    "email":"kevinrosales@pm.me",<br>
                    "commits":10,<br>
                    "last_commit_title": "Finalizing GoLinks Test"<br>

        }]
        <br><br>
        <strong>Get it up and running:</strong><br>
        The code can be deployed to any PHP hosting platform. Version 7.4 of PHP was used for testing but it should run on higher versions. <br><br>
        Set an environment variable called GITHUB_ACCESS_TOKEN and set its value to a valid GitHub Personal Access Token<br>
        https://docs.github.com/en/authentication/keeping-your-account-and-data-secure/creating-a-personal-access-token
        
        <br><br>

        <strong>Notes:</strong><br>
        The endpoint will return results with the 'org=Netflix&page=X' parameters but you will have to wait a minute to call it again/another page. <br>
        I was testing along the way but didn't run into the rate limiting issues until I deployed to Heroku and tried hitting different pages right after another.<br>
        I have a few ideas that would help but ran out of time.<br>

    </div>
</body>
</html>
