<?php

include 'validators.php';
include 'Log.php';

session_start();

// inputs value.
$people = isset($_POST['add_people']) ? $_POST['add_people'] : 0;
$location = isset($_POST['location']) ? $_POST['location'] : "onbekend";
$activity = isset($_POST['activity']) ? $_POST['activity'] : "onbekend";

$remove_people = isset($_POST['remove_people']) ? $_POST['remove_people'] : 0;

// set session if not set.
if (!isset($_SESSION['logs'])) {
    $_SESSION['logs'] = array();
}

if (!isset($_SESSION['inside_count'])) {
    $_SESSION['inside_count'] = 0;
}

if (!isset($_SESSION['outside_count'])) {
    $_SESSION['outside_count'] = 0;
}

if (!isset($_SESSION['errors'])) {
    $_SESSION['errors'] = array();
}

if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
}

// store new object.
if (isset($_POST['add'])) {
    $new_log = new Log();
    $new_log->people = $people;
    $new_log->enter = true;
    $new_log->timestamp = date("Y/m/d");
    $new_log->location = $location;

    if (isUnderZero($people)) {
        $_SESSION['errors'][] = "value is under 0";
        return header('Location: index.php');
    }

    if ($location == "inside") {
        if (isMoreThan50($_SESSION['inside_count'], $people)) {
            $_SESSION['errors'][] = "full people inside";
            return header('Location: index.php');
        }
    }


    $_SESSION['logs'][] = $new_log;

    if ($location == "inside") {
        $_SESSION['inside_count'] = $_SESSION['inside_count'] + $people;
    }

    if ($location == "outside") {
        $_SESSION['outside_count'] = $_SESSION['outside_count'] + $people;
    }

    $_SESSION['total'] = $_SESSION['total'] + $people;
    unset($_SESSION['errors']);

    return header('Location: historiek.php');
}


// remove a object
if (isset($_POST['remove'])) {
    $new_log = new Log();
    $new_log->people = $remove_people;
    $new_log->enter = false;
    $new_log->timestamp = date("Y/m/d");
    $new_log->location = $location;

    if ($location == "inside") {
        if (isNull($_SESSION['inside_count'], $remove_people)) {
            $_SESSION['errors'][] = "No people inside to remove";
            return header('Location: index.php');
        }
    }


    if ($location == "outside") {
        if (isNull($_SESSION['outside_count'], $remove_people)) {
            $_SESSION['errors'][] = "No people outside to remove";
            return header('Location: index.php');
        }
    }


    $_SESSION['logs'][] = $new_log;

    if ($location == "inside") {
        $_SESSION['inside_count'] = $_SESSION['inside_count'] - $remove_people;
    }

    if ($location == "outside") {
        $_SESSION['outside_count'] = $_SESSION['outside_count'] - $remove_people;
    }

    $_SESSION['total'] = $_SESSION['total'] - $remove_people;
    unset($_SESSION['errors']);

    return header('Location: historiek.php');
}
