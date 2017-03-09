<?php
/**
 * Data Scrubber v1.0.0
 * ==============================================================
 *
 * This script will scrub some of the user data so that it's
 * safer to use in staging and developer environments.
 *
 * CHANGELOG:
 * 20170309: Initial commit of this script.
 *
 */

set_time_limit(0);
error_reporting(E_ALL);

/**
 * START OF CONFIGURATION VARIABLES
 */

/*
 * Database server connection information.
 */
$database_hostname = $_SERVER["DATABASE_HOSTNAME"];
$database_username = $_SERVER["DATABASE_USERNAME"];
$database_password = $_SERVER["DATABASE_PASSWORD"];

/*
 * Databases that will be scrubbed.
 */
$staging_entrada = $_SERVER["STAGING_ENTRADA"];
$staging_entrada_auth = $_SERVER["STAGING_ENTRADA_AUTH"];
$staging_entrada_clerkship = $_SERVER["STAGING_ENTRADA_CLERKSHIP"];

/*
 * Username prefix (i.e user = user1, user2030, user225322)
 */
$username_prefix = "user";

/*
 * Reset password for all user accounts.
 */
$user_password = "apple123";

/*
 * The current timezone.
 */
$timezone = "America/Toronto";

/*
 * Arrays used to seed random data.
 */
$firstnames = array("John", "William", "James", "Charles", "George", "Frank", "Joseph", "Thomas", "Henry", "Robert", "Edward", "Harry", "Walter", "Arthur", "Fred", "Albert", "Samuel", "David", "Louis", "Joe", "Charlie", "Clarence", "Richard", "Andrew", "Daniel", "Ernest", "Will", "Jesse", "Oscar", "Lewis", "Peter", "Benjamin", "Frederick", "Willie", "Alfred", "Sam", "Roy", "Herbert", "Jacob", "Tom", "Elmer", "Carl", "Lee", "Howard", "Martin", "Michael", "Bert", "Herman", "Jim", "Francis", "Harvey", "Earl", "Eugene", "Ralph", "Ed", "Claude", "Edwin", "Ben", "Charley", "Paul", "Edgar", "Isaac", "Otto", "Luther", "Lawrence", "Ira", "Patrick", "Guy", "Oliver", "Theodore", "Hugh", "Clyde", "Alexander", "August", "Floyd", "Homer", "Jack", "Leonard", "Horace", "Marion", "Philip", "Allen", "Archie", "Stephen", "Chester", "Willis", "Raymond", "Rufus", "Warren", "Jessie", "Milton", "Alex", "Leo", "Julius", "Ray", "Sidney", "Bernard", "Dan", "Jerry", "Calvin", "Perry", "Dave", "Anthony", "Eddie", "Amos", "Dennis", "Clifford", "Leroy", "Wesley", "Alonzo", "Garfield", "Franklin", "Emil", "Leon", "Nathan", "Harold", "Matthew", "Levi", "Moses", "Everett", "Lester", "Winfield", "Adam", "Lloyd", "Mack", "Fredrick", "Jay", "Jess", "Melvin", "Noah", "Aaron", "Alvin", "Norman", "Gilbert", "Elijah", "Victor", "Gus", "Nelson", "Jasper", "Silas", "Christopher", "Jake", "Mike", "Percy", "Adolph", "Maurice", "Cornelius", "Felix", "Reuben", "Wallace", "Claud", "Roscoe", "Sylvester", "Earnest", "Hiram", "Otis", "Simon", "Willard", "Irvin", "Mark", "Jose", "Wilbur", "Abraham", "Virgil", "Clinton", "Elbert", "Leslie", "Marshall", "Owen", "Wiley", "Anton", "Morris", "Manuel", "Phillip", "Augustus", "Emmett", "Eli", "Nicholas", "Wilson", "Alva", "Harley", "Newton", "Timothy", "Marvin", "Ross", "Curtis", "Edmund", "Jeff", "Elias", "Harrison", "Stanley", "Columbus", "Lon", "Ora", "Ollie", "Russell", "Pearl", "Solomon", "Arch", "Asa", "Clayton", "Enoch", "Irving", "Mathew", "Nathaniel", "Scott", "Hubert", "Lemuel", "Andy", "Ellis", "Emanuel", "Joshua", "Millard", "Vernon", "Wade", "Cyrus", "Miles", "Rudolph", "Sherman", "Austin", "Bill", "Chas", "Lonnie", "Monroe", "Byron", "Edd", "Emery", "Grant", "Jerome", "Max", "Mose", "Steve", "Gordon", "Abe", "Pete", "Chris", "Clark", "Gustave", "Orville", "Lorenzo", "Bruce", "Marcus", "Preston", "Bob", "Dock", "Donald", "Jackson", "Cecil", "Barney", "Delbert", "Edmond", "Anderson", "Christian", "Glenn", "Jefferson", "Luke", "Neal", "Burt", "Ike", "Myron", "Tony", "Conrad", "Joel", "Matt", "Riley", "Vincent", "Emory", "Isaiah", "Nick", "Ezra", "Green", "Juan", "Clifton", "Lucius", "Porter", "Arnold", "Bud", "Jeremiah", "Taylor", "Forrest", "Roland", "Spencer", "Burton", "Don", "Emmet", "Gustav", "Louie", "Morgan", "Ned", "Van", "Ambrose", "Chauncey", "Elisha", "Ferdinand", "General", "Julian", "Kenneth", "Mitchell", "Allie", "Josh", "Judson", "Lyman", "Napoleon", "Pedro", "Berry", "Dewitt", "Ervin", "Forest", "Lynn", "Pink", "Ruben", "Sanford", "Ward", "Douglas", "Ole", "Omer", "Ulysses", "Walker", "Wilbert", "Adelbert", "Benjiman", "Ivan", "Jonas", "Major", "Abner", "Archibald", "Caleb", "Clint", "Dudley", "Granville", "King", "Mary", "Merton", "Antonio", "Bennie", "Carroll", "Freeman", "Josiah", "Milo", "Royal", "Dick", "Earle", "Elza", "Emerson", "Fletcher", "Judge", "Laurence", "Neil", "Roger", "Seth", "Glen", "Hugo", "Jimmie", "Johnnie", "Washington", "Elwood", "Gust", "Harmon", "Jordan", "Simeon", "Wayne", "Wilber", "Clem", "Evan", "Frederic", "Irwin", "Junius", "Lafayette", "Loren", "Madison", "Mason", "Orval", "Abram", "Aubrey", "Elliott", "Hans", "Karl", "Minor", "Wash", "Wilfred", "Allan", "Alphonse", "Dallas", "Dee", "Isiah", "Jason", "Johnny", "Lawson", "Lew", "Micheal", "Orin", "Addison", "Cal", "Erastus", "Francisco", "Hardy", "Lucien", "Randolph", "Stewart", "Vern", "Wilmer", "Zack", "Adrian", "Alvah", "Bertram", "Clay", "Ephraim", "Fritz", "Giles", "Grover", "Harris", "Isom", "Jesus", "Johnie", "Jonathan", "Lucian", "Malcolm", "Merritt", "Otho", "Perley", "Rolla", "Sandy", "Tomas", "Wilford", "Adolphus", "Angus", "Arther", "Carlos", "Cary", "Cassius", "Davis", "Hamilton", "Harve", "Israel", "Leander", "Melville", "Merle", "Murray", "Pleasant", "Sterling", "Steven", "Axel", "Boyd", "Bryant", "Clement", "Erwin", "Ezekiel", "Foster", "Frances", "Geo", "Houston", "Issac", "Jules", "Larkin", "Mat", "Morton", "Orlando", "Pierce", "Prince", "Rollie", "Rollin", "Sim", "Stuart", "Wilburn", "Bennett", "Casper", "Christ", "Dell", "Egbert", "Elmo", "Fay", "Gabriel", "Hector", "Horatio", "Lige", "Saul", "Smith", "Squire", "Tobe", "Tommie", "Wyatt", "Alford", "Alma", "Alton", "Andres", "Burl", "Cicero", "Dean", "Dorsey", "Enos", "Howell", "Lou", "Loyd", "Mahlon", "Nat", "Omar", "Oran", "Parker", "Raleigh", "Reginald");
$lastnames = array("Smith", "Johnson", "Williams", "Brown", "Jones", "Miller", "Davis", "Garcia", "Rodriguez", "Wilson", "Martinez", "Anderson", "Taylor", "Thomas", "Hernandez", "Moore", "Martin", "Jackson", "Thompson", "White", "Lopez", "Lee", "Gonzalez", "Harris", "Clark", "Lewis", "Robinson", "Walker", "Perez", "Hall", "Young", "Allen", "Sanchez", "Wright", "King", "Scott", "Green", "Baker", "Adams", "Nelson", "Hill", "Ramirez", "Campbell", "Mitchell", "Roberts", "Carter", "Phillips", "Evans", "Turner", "Torres", "Parker", "Collins", "Edwards", "Stewart", "Flores", "Morris", "Nguyen", "Murphy", "Rivera", "Cook", "Rogers", "Morgan", "Peterson", "Cooper", "Reed", "Bailey", "Bell", "Gomez", "Kelly", "Howard", "Ward", "Cox", "Diaz", "Richardson", "Wood", "Watson", "Brooks", "Bennett", "Gray", "James", "Reyes", "Cruz", "Hughes", "Price", "Myers", "Long", "Foster", "Sanders", "Ross", "Morales", "Powell", "Sullivan", "Russell", "Ortiz", "Jenkins", "Gutierrez", "Perry", "Butler", "Barnes", "Fisher", "Henderson", "Coleman", "Simmons", "Patterson", "Jordan", "Reynolds", "Hamilton", "Graham", "Kim", "Gonzales", "Alexander", "Ramos", "Wallace", "Griffin", "West", "Cole", "Hayes", "Chavez", "Gibson", "Bryant", "Ellis", "Stevens", "Murray", "Ford", "Marshall", "Owens", "Mcdonald", "Harrison", "Ruiz", "Kennedy", "Wells", "Alvarez", "Woods", "Mendoza", "Castillo", "Olson", "Webb", "Washington", "Tucker", "Freeman", "Burns", "Henry", "Vasquez", "Snyder", "Simpson", "Crawford", "Jimenez", "Porter", "Mason", "Shaw", "Gordon", "Wagner", "Hunter", "Romero", "Hicks", "Dixon", "Hunt", "Palmer", "Robertson", "Black", "Holmes", "Stone", "Meyer", "Boyd", "Mills", "Warren", "Fox", "Rose", "Rice", "Moreno", "Schmidt", "Patel", "Ferguson", "Nichols", "Herrera", "Medina", "Ryan", "Fernandez", "Weaver", "Daniels", "Stephens", "Gardner", "Payne", "Kelley", "Dunn", "Pierce", "Arnold", "Tran", "Spencer", "Peters", "Hawkins", "Grant", "Hansen", "Castro", "Hoffman", "Hart", "Elliott", "Cunningham", "Knight", "Bradley", "Carroll", "Hudson", "Duncan", "Armstrong", "Berry", "Andrews", "Johnston", "Ray", "Lane", "Riley", "Carpenter", "Perkins", "Aguilar", "Silva", "Richards", "Willis", "Matthews", "Chapman", "Lawrence", "Garza", "Vargas", "Watkins", "Wheeler", "Larson", "Carlson", "Harper", "George", "Greene", "Burke", "Guzman", "Morrison", "Munoz", "Jacobs", "Obrien", "Lawson", "Franklin", "Lynch", "Bishop", "Carr", "Salazar", "Austin", "Mendez", "Gilbert", "Jensen", "Williamson", "Montgomery", "Harvey", "Oliver", "Howell", "Dean", "Hanson", "Weber", "Garrett", "Sims", "Burton", "Fuller", "Soto", "Mccoy", "Welch", "Chen", "Schultz", "Walters", "Reid", "Fields", "Walsh", "Little", "Fowler", "Bowman", "Davidson", "May", "Day", "Schneider", "Newman", "Brewer", "Lucas", "Holland", "Wong", "Banks", "Santos", "Curtis", "Pearson", "Delgado", "Valdez", "Pena", "Rios", "Douglas", "Sandoval", "Barrett", "Hopkins", "Keller", "Guerrero", "Stanley", "Bates", "Alvarado", "Beck", "Ortega", "Wade", "Estrada", "Contreras", "Barnett", "Caldwell", "Santiago", "Lambert", "Powers", "Chambers", "Nunez", "Craig", "Leonard", "Lowe", "Rhodes", "Byrd", "Gregory", "Shelton", "Frazier", "Becker", "Maldonado", "Fleming", "Vega", "Sutton", "Cohen", "Jennings", "Parks", "Mcdaniel", "Watts", "Barker", "Norris", "Vaughn", "Vazquez", "Holt", "Schwartz", "Steele", "Benson", "Neal", "Dominguez", "Horton", "Terry", "Wolfe", "Hale", "Lyons", "Graves", "Haynes", "Miles", "Park", "Warner", "Padilla", "Bush", "Thornton", "Mccarthy", "Mann", "Zimmerman", "Erickson", "Fletcher", "Mckinney", "Page", "Dawson", "Joseph", "Marquez", "Reeves", "Klein", "Espinoza", "Baldwin", "Moran", "Love", "Robbins", "Higgins", "Ball", "Cortez", "Le", "Griffith", "Bowen", "Sharp", "Cummings", "Ramsey", "Hardy", "Swanson", "Barber", "Acosta", "Luna", "Chandler", "Blair", "Daniel", "Cross", "Simon", "Dennis", "Oconnor", "Quinn", "Gross", "Navarro", "Moss", "Fitzgerald", "Doyle", "Mclaughlin", "Rojas", "Rodgers", "Stevenson", "Singh", "Yang", "Figueroa", "Harmon", "Newton", "Paul", "Manning", "Garner", "Mcgee", "Reese", "Francis", "Burgess", "Adkins", "Goodman", "Curry", "Brady", "Christensen", "Potter", "Walton", "Goodwin", "Mullins", "Molina", "Webster", "Fischer", "Campos", "Avila", "Sherman", "Todd", "Chang", "Blake", "Malone", "Wolf", "Hodges", "Juarez", "Gill", "Farmer", "Hines", "Gallagher", "Duran", "Hubbard", "Cannon", "Miranda", "Wang", "Saunders", "Tate", "Mack", "Hammond", "Carrillo", "Townsend", "Wise", "Ingram", "Barton", "Mejia", "Ayala", "Schroeder", "Hampton", "Rowe", "Parsons", "Frank", "Waters", "Strickland", "Osborne", "Maxwell", "Chan", "Deleon", "Norman", "Harrington", "Casey", "Patton", "Logan", "Bowers", "Mueller", "Glover", "Floyd", "Hartman", "Buchanan", "Cobb", "French", "Kramer", "Mccormick", "Clarke", "Tyler", "Gibbs", "Moody", "Conner", "Sparks", "Mcguire", "Leon", "Bauer", "Norton", "Pope", "Flynn", "Hogan", "Robles", "Salinas", "Yates", "Lindsey", "Lloyd", "Marsh", "Mcbride", "Owen", "Solis", "Pham", "Lang", "Pratt");
$streetnames = array("Second", "First", "Third", "Fourth", "Fifth", "Sixth", "Seventh", "Eigth", "Ninth", "Tenth", "Main", "Fairview", "Hill", "Mountain View", "Clear", "Huxtable", "Conway", "Castle", "Elmwood", "Princess", "King", "Bath", "Vista", "Alta Vista", "Richmond", "Dundas", "Colonial", "Quinton");
$streetsuffix = array("Road", "Street", "Avenue", "Lane", "Crescent");

/**
 * END OF CONFIGURATION VARIABLES
 */

/*
 * Sets the current timezone.
 */
date_default_timezone_set($timezone);

/**
 * Connect to entrada_auth MySQL database using the same user used to import
 * the MySQL dump from db02.
 */
$db = new mysqli($database_hostname, $database_username, $database_password, $staging_entrada);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit;
}

$users = $db->query("SELECT a.* FROM `" . $staging_entrada_auth . "`.`user_data` AS a ORDER BY a.`id`");
if ($users) {
    while ($user = $users->fetch_object()) {
        $query = "UPDATE `" . $staging_entrada_auth . "`.`user_data` SET
                    `number` = '12345" . $user->id . "',
                    `username` = '" . $username_prefix . $user->id . "',
                    `password` = SHA1('" . $user_password . "dabb46b438407ffca46f9b866b5776247dfde702'),
                    `salt` = 'dabb46b438407ffca46f9b866b5776247dfde702',
                    `firstname` = '" . $firstnames[array_rand($firstnames)] . "',
                    `lastname` = '" . $lastnames[array_rand($lastnames)] . "',
                    `email` = '" . $username_prefix . "+" . $user->id . "@example.org',
                    `email_alt` = '',
                    `address` = '',
                    `uuid` = UUID(),
                    `pin` = NULL
                    WHERE `id` = " . $user->id;
        if (!$db->query($query)) {
            die("Error in SQL query.");
        }
    }
}

$electives = $db->query("SELECT a.* FROM `" . $staging_entrada_clerkship . "`.`electives` AS a ORDER BY a.`electives_id`");
if ($electives) {
    while ($elective = $electives->fetch_object()) {
        $query = "UPDATE `" . $staging_entrada_clerkship . "`.`electives` SET
                    `email` = '" . $username_prefix . "+elective" . $elective->electives_id . "@example.org', 
                    `preceptor_first_name` = '" . $firstnames[array_rand($firstnames)] . "',
                    `preceptor_last_name` = '" . $lastnames[array_rand($lastnames)] . "',
                    `address` = '" . rand(1, 999) . " " . $streetnames[array_rand($streetnames)] . " " . $streetsuffix[array_rand($streetsuffix)] . "',
                    `postal_zip_code` = '90210',
                    `phone` = '613-555-1234',
                    `fax` = '613-555-4321'
                    WHERE `electives_id` = " . $elective->electives_id;
        if (!$db->query($query)) {
            die("Error in SQL query.");
        }
    }
}

$occupants = $db->query("SELECT a.* FROM `" . $staging_entrada_clerkship . "`.`apartment_schedule` AS a WHERE `occupant_title` != '' OR `occupant_title` != NULL ORDER BY a.`aschedule_id`");
if ($occupants) {
    while ($occupant = $occupants->fetch_object()) {
        $query = "UPDATE `" . $staging_entrada_clerkship . "`.`apartment_schedule` SET
                    `occupant_title` = '" . $firstnames[array_rand($firstnames)] . " " . $lastnames[array_rand($lastnames)] . "'
                    WHERE `aschedule_id` = " . $occupant->aschedule_id;
        if (!$db->query($query)) {
            die("Error in SQL query.");
        }
    }
}

$supers = $db->query("SELECT a.* FROM `" . $staging_entrada_clerkship . "`.`apartments` as a ORDER BY a.`apartment_id`");
if ($supers) {
    while ($super = $supers->fetch_object()) {
        $address = rand(1, 999) . " " . $streetnames[array_rand($streetnames)] . " " . $streetsuffix[array_rand($streetsuffix)];
        $query = "UPDATE `" . $staging_entrada_clerkship . "`.`apartments` SET
                    `super_firstname` = '" . $firstnames[array_rand($firstnames)] . "',
                    `super_lastname` = '" . $lastnames[array_rand($lastnames)] . "',
                    `keys_firstname` = '" . $firstnames[array_rand($firstnames)] . "',
                    `keys_lastname` = '" . $lastnames[array_rand($lastnames)] . "',
                    `apartment_title` = '" . $super->apartment_id . "-" . $address . "',
                    `apartment_address` = '" . $address . "',
                    `apartment_postcode` = '90210',
                    `apartment_phone` = '613-555-6789',
                    `apartment_email` = '" . $username_prefix . "+apartment" . $super->apartment_id . "@example.org',
                    `super_email` = '" . $username_prefix . "+super" . $super->apartment_id . "@example.org',
                    `keys_email` = '" . $username_prefix . "+keys" . $super->apartment_id . "@example.org',
                    `super_phone` = '613-555-1234',
                    `keys_phone` = '613-555-4321'
                    WHERE `apartment_id` = " . $super->apartment_id;
        if (!$db->query($query)) {
            die("Error in SQL query.");
        }
    }
}
