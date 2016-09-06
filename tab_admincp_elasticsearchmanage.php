<h2>Manage ElasticSearch Index...</h2>

<h1>Elasticsearch Management Area</h1>

<p>&nbsp;</p>

<p style="text-align: center;"><a class="darkorangeButton" href="<?php echo $baseurl; ?>/admincp/?cptab=elasticsearchmanage&command=createelasticsearchgamesindex">Create ElasticSearch 'TheGamesDB' Index</a></p>

<br>
<hr>
<br>

<p style="text-align: center;"><a class="darkorangeButton" href="<?php echo $baseurl; ?>/admincp/?cptab=elasticsearchmanage&command=populategames">Index/Re-Index Games Table into ElasticSearch</a></p>

<br>
<hr>
<br>

<form action="<?php echo $baseurl; ?>/admincp/" method="post" style="text-align: center;">
    <input type="text" name="searchterm" style="width: 80%; margin: auto; font-size: 18px; padding: 5px;" placeholder="Enter Game Title..." />
    <input type="hidden" name="cptab" value="elasticsearchmanage" />
    <input type="hidden" name="command" value="search" />
    <input class="darkorangeButton" type="submit" value="Search Elasticsearch Index for Game" />
</form>

<br>
<hr>
<br>

<p style="text-align: center;"><a class="darkorangeButton" href="<?php echo $baseurl; ?>/adminarea/elastichq/" target="_blank">Launch ElasticHQ Management Portal</a></p>

<br>
<hr>
<br>
<?php
// Main Switchboard
switch ($command) {
    case ('createelasticsearchgamesindex'):
        echo '<h2>Create ElasticSearch TheGamesDB Index</h2>';

        try {
            $indexParams['index'] = 'thegamesdb';

            // Example Index Mapping
            $myTypeMapping = array(
                '_source' => array(
                    'enabled' => true
                ),
                'PlatformName' => array(
                    'type' => 'string',
                    'index' => 'not_analyzed'
                )
            );
            $indexParams['body']['mappings']['game'] = $myTypeMapping;

            // Create the index
            if ($elasticsearchClient->indices()->create($indexParams)) {
                echo '<p style="text-align: center;">ElasticSearch Index \'thegamesdb\' Created Successfully</p>';
            }
        } catch (Exception $e) {
            ?>
            <div style="text-align: center;">
                <p><strong>Whoops!</strong> Something went wrong while trying to create the index...</p>
                <p><em>Maybe the index 'thegamesdb' already exists, or ElasticSearch was unreachable?</em></p>
                <h3>Exception Dump</h3>
                <pre><?php echo $e->getMessage(); ?></pre>
            </div>
            <?php
        }

        break;

    case ('populategames'):
        echo '<h2>Populate Elasticsearch With Games Data</h2>';

        $dbGamesResult = mysql_query("SELECT `g`.*, `p`.`id` AS `PlatformId`, `p`.`name` AS `PlatformName`, `p`.`alias` AS `PlatformAlias`, `p`.`icon` AS `PlatformIcon` FROM `games` AS `g`, `platforms` AS `p` WHERE `g`.`Platform` = `p`.`id`");
        while ($dbGamesRow = mysql_fetch_assoc($dbGamesResult)) {
            $searchParams = array();
            $searchParams['body'] = $dbGamesRow;
            $searchParams['index'] = 'thegamesdb';
            $searchParams['type'] = 'game';
            $searchParams['id'] = $dbGamesRow['id'];
            $ret = $elasticsearchClient->index($searchParams);
            var_dump($ret);
        }

        break;

    case ('search'):
        echo '<h2>Search Elasticsearch For ' . $searchterm . '</h2>';

        // Set initial Search Parameters
        $searchParams = array();
        $searchParams['index'] = 'thegamesdb';
        $searchParams['type'] = 'game';
        $searchParams['size'] = 100;

        // Check if $search term contains an integer
        if (strcspn($searchterm, '0123456789') != strlen($searchterm)) {
            echo "<p>Search Term Contains a Number</p>";

            // Extract first number found in string
            preg_match('/\d+/', $searchterm, $numbermatch, PREG_OFFSET_CAPTURE);
            $numberAsNumber = $numbermatch[0][0];

            // Convert Number to Roman Numerals
            $numberAsRoman = romanNumerals($numberAsNumber);

            // Replace Number in string with RomanNumerals
            $searchtermRoman = str_replace($numberAsNumber, $numberAsRoman, $searchterm);

            echo "<pre>";
            echo "<p>" . $numbermatch[0][0] . " in Roman Numerals is " . $numberAsRoman . "</p>";
            echo "<p>Search Term:" . $searchterm . " in Roman Numerals is " . $searchtermRoman . "</p>";
            echo "</pre>";

            $json = '{
												      "query": {
												        "bool": {
												          "must": [
												            {
												              "match": {
												                "GameTitle": "' . $searchterm . '"
												              }
												            },
												            {
												              "match": {
												                "GameTitle": "' . $searchtermRoman . '"
												              }
												            }
												          ]
												        }
												      }
												    }';
            $searchParams['body'] = $json;
        } else {
            //$searchParams['body']['query']['match']['title'] = $searchterm;
            $json = '{
												      "query": {
											            "multi_match": {
											                "query": "' . $searchterm . '",
											                "fields": [ "GameTitle", "Alternates" ]
											              }
												        }
												      }
												    }';
            $searchParams['body'] = $json;
        }

        $elasticResults = $elasticsearchClient->search($searchParams);


        echo "<h3>" . $elasticResults['hits']['total'] . " Games Found</h3>";

        echo "<hr />";


        foreach ($elasticResults['hits']['hits'] as $elasticGame) {
            //var_dump($elasticGame);
            ?>

            <div>
                <h4>Title: <?php echo $elasticGame['_source']['GameTitle']; ?></h4>
                <p>Search Score: <?php echo $elasticGame['_score']; ?></p>
                <p>ID: <?php echo $elasticGame['_source']['id']; ?></p>
                <p>Released: <?php echo $elasticGame['_source']['ReleaseDate']; ?></p>
                <p>Platform: <?php echo $elasticGame['_source']['Platform'] . " | " . $elasticGame['_source']['PlatformName'] . " | " . $elasticGame['_source']['PlatformAlias']; ?></p>
                <hr>
            </div>

            <?php
        }

        break;
}
?>