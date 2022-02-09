function getRepos($organization){
        global $client;
        global $pagerO;

        $orgAPI = $client->api('organization');    
        $params = array($org);
        $repositories = $pagerO->fetch($orgAPI, 'repositories', $params);
        $firstDo = True;
        do {
            if ($firstDo){
                $firstDo = False;
                foreach ($repositories as $repo){                
                    getContributors($repo['owner']['login'], $repo['name']);
                }
            }
            else{
                $pagerO->fetchNext();
                foreach ($repositories as $repo){                
                    getContributors($repo['owner']['login'], $repo['name']);
                }            
            }
        }
        while ($pagerO->hasNext());
    }   


    function getContributors($user, $repo){
        global $client;    
        global $pagerC;     

        $repoAPI = $client->api('repo');
        $params = array($user, $repo);
        $contributors = $pagerC->fetch($repoAPI, 'contributors', $params);
        $firstDo = True;
        do {
            if ($firstDo){
                $firstDo = False;
                foreach($contributors as $cont){
                    addContributor($cont);
                }
            }
            else{
                $pagerC->fetchNext();
                foreach($contributors as $cont){
                    addContributor($cont);
                }
            }
        }
        while($pagerC->hasNext());
    }

    function addContributor($user){
        global $contributors_arr;
        $dupe_contributor = array_search($user['login'], array_column($contributors_arr, 'username'));//SEARCHING FOR USER IN MY ARRAY = INDEX or FALSE

        if ($dupe_contributor !== False){ //USER EXISTS, SO I ADD CONTRIBUTIONS TO PREVIOUS CONTRIBUTIONS
            $contributors_arr[$dupe_contributor]['commits'] = $contributors_arr[$dupe_contributor]['commits'] + $user['contributions'];
        }
        else{ //USER DOESNT EXIST   
            $contributors_arr[]= array('username'=>$user['login'], 'image_url'=>$user['avatar_url'], 'commits'=>$user['contributions'], 'email'=>'email', 'last_commit_title'=>'last_commit_title');
        }
    }