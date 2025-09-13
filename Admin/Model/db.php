<?php

class myDB {
    
    //open connection

    function openCon() {
        $DBHost = "localhost:3306";
        $DBuser = "root";
        $DBpassword = "";
        $DBname = "freelancingmarketplace";

        $connectionObject = new mysqli($DBHost, $DBuser, $DBpassword, $DBname);

       //object oriented code to check connection
        if ($connectionObject->connect_error) {
            die("Connection failed: " . $connectionObject->connect_error);
        }
        

        return $connectionObject;
    }   


  
    public function insertUserData($conn, $username, $email, $password, $userType) {
        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    
        // SQL statement with only the required fields
        $sql = "INSERT INTO users (username, email, password, userType) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $userType);
    
        return $stmt->execute();
    }
    
    


    // Delete user by user_id


    // Insert data into the database
    public function insertAdminData($connectionObject, $fullname, $username, $email, $nid, $phone, $dob, $gender, $present_address, $permanent_address, $password) {
        if ($this->isUsernameExists($connectionObject, $username)) {
            return 0; // Username already exists
        }
    
        $sql = "INSERT INTO admin (fullname, username, email, nid, phone, dob, gender, present_address, permanent_address, password) 
                VALUES ('$fullname', '$username', '$email', '$nid', '$phone', '$dob', '$gender', '$present_address', '$permanent_address', '$password')";
        
        return $connectionObject->query($sql) ? 1 : 0;
    }
    



    //put the username and password, userType in user table in the database
 


    function insertUser($connectionObject, $username, $password, $email, $userType) {
        if ($this->isUsernameExists($connectionObject, $username)) {
            return 0; // Username already exists
        }

        $sql = "INSERT INTO users (username, password, email, userType) 
                VALUES ('$username', '$password', '$email', '$userType')";
        
        return $connectionObject->query($sql) ? 1 : 0;
    }

    // Delete user by user_id
    function deleteUser($connectionObject, $user_id) {
        $sql = "DELETE FROM users WHERE user_id = $user_id";
        return $connectionObject->query($sql) ? 1 : 0;
    }





     //getUserByUsername
     function getUserByUsername($connectionObject, $username) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $connectionObject->query($sql);
        return $result->fetch_assoc();
    }
    


    
        // Existing methods...
    
        // Fetch all clients
        function getAllClients($connectionObject) {
            $sql = "SELECT * FROM users WHERE userType = 'client'";
            $result = $connectionObject->query($sql);
    
            $clients = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $clients[] = $row;
                }
            }
    
            return $clients;
        }


        
        function getAllfreelancer($connectionObject) {
            $sql = "SELECT * FROM users WHERE userType = 'freelancer'";
            $result = $connectionObject->query($sql);
    
            $freelancers = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $freelancers[] = $row;
                }
            }
    
            return $freelancers;
        }

        function getAlladmin($connectionObject) {
            $sql = "SELECT * FROM users WHERE userType = 'admin'";
            $result = $connectionObject->query($sql);
    
            $admins = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $admins[] = $row;
                }
            }
    
            return $admins;
        }
    

        function getAllmod($connectionObject) {
            $sql = "SELECT * FROM users WHERE userType = 'modarator'";
            $result = $connectionObject->query($sql);
    
            $mods = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $mods[] = $row;
                }
            }
    
            return $mods;
        }
        // Other methods...
    

    //isUsernameExists
    function isUsernameExists($connectionObject,$username) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $connectionObject->query($sql);
        return $result->num_rows > 0;
    }

   

    //updateUserPassword
    function updateUserPassword($connectionObject, $username, $newPassword) {
        $sql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
        $connectionObject->query($sql);


    }
    //updateUserEmail
    function updateUserEmail($connectionObject, $username, $newEmail) {
        $sql = "UPDATE users SET email = '$newEmail' WHERE username = '$username'";
        $connectionObject->query($sql);
    }


     //searchfreelaner
     function searchFreelancer($connectionObject,$searchQuery) {
        
    
        $query = "SELECT * FROM users WHERE userType = 'freelancer' AND (username LIKE ? OR user_id = ?)";
        $stmt = $connectionObject->prepare($query);
        $searchParameter = "%$searchQuery%";
        $stmt->bind_param("ss", $searchParameter, $searchQuery);
        $stmt->execute();
        $result = $stmt->get_result();
        $freelancers = [];
        while ($row = $result->fetch_assoc()) {
            $freelancers[] = $row;
        }
    
        return $freelancers;
    }


    

    //post job
    function postJob($connectionObject,$client_id, $title, $description, $job_type, $payment) {
        
        $response = ['success' => false, 'message' => ''];
    
        if ($connectionObject->connect_error) {
            $response['message'] = "Connection failed: " . $connectionObject->connect_error;
            return $response;
        }
    
        $stmt = $connectionObject->prepare("INSERT INTO jobs (client_id, title, description, job_type, payment) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isssd", $client_id, $title, $description, $job_type, $payment);
    
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "New job posted successfully";
        } else {
            $response['message'] = "Error posting the job: " . $stmt->error;
        }
    
        $stmt->close();
        $connectionObject->close();
    
        return $response;
    }


  // Function to fetch jobs
    function getJobsByClientId($connectionObject,$client_id) {
        
    
        $query = "SELECT j.*, 
                         a.freelancer_id, 
                         u.username AS freelancer_username,
                         a.application_text,
                         a.application_date,
                         a.status AS application_status,
                         p.payment_id,
                         p.amount AS payment_amount,
                         p.payment_date
                  FROM jobs j
                  LEFT JOIN applications a ON j.job_id = a.job_id
                  LEFT JOIN users u ON a.freelancer_id = u.user_id
                  LEFT JOIN payments p ON j.job_id = p.job_id AND a.freelancer_id = p.freelancer_id
                  WHERE j.client_id = ?";
        
        $stmt = $connectionObject->prepare($query);
        $stmt->bind_param("i", $client_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $jobs = [];
        while ($row = $result->fetch_assoc()) {
            $jobs[] = $row;
        }
        return $jobs;
    }

    //search jobs by jobID
    
    function searchJobsByJobID($connectionObject,$jobID) {
      
    
        $query = "SELECT * FROM jobs WHERE job_id = ?";
        $stmt = $connectionObject->prepare($query);
        $stmt->bind_param("i", $jobID);
        $stmt->execute();
        $result = $stmt->get_result();
        $jobs = [];
        while ($row = $result->fetch_assoc()) {
            $jobs[] = $row;
        }
    
        return $jobs;
    }



    //delete job 
    function deleteJob($connectionObject,$jobID) {
    try {
        
        $query = "DELETE FROM jobs WHERE job_id = ?";
        $stmt = $connectionObject->prepare($query);
        $stmt->bind_param("i", $jobID);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        return false;
    }
    }



    //update job
    function updateJob($connectionObject,$jobID, $title, $description, $jobType, $payment) {
   
    $response = ['success' => false, 'message' => ''];
    try {
        $query = "UPDATE jobs SET title = ?, description = ?, job_type = ?, payment = ? WHERE job_id = ?";
        $stmt = $connectionObject->prepare($query);
        $stmt->bind_param("ssdsi", $title, $description, $jobType, $payment, $jobID);
        
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Job updated successfully";
        } else {
            $response['message'] = "Error updating the job: " . $stmt->error;
        }
    } catch (Exception $e) {
        $response['message'] = "Exception: " . $e->getMessage();
    } finally {
        $stmt->close();
        $connectionObject->close();
    }

    return $response;
    }

    // Update profile picture
     public function updateProfilePicture($connectionObject, $user_id, $profile_pic) {
    $stmt = $connectionObject->prepare("UPDATE users SET profile_pic=? WHERE user_id=?");
    $stmt->bind_param("si", $profile_pic, $user_id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
    }

     // Get user details
    public function getUserById($connectionObject, $user_id) {
    $stmt = $connectionObject->prepare("SELECT * FROM users WHERE user_id=?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result->fetch_assoc();
     }

     function fetchFreelancerApplications($connectionObject,$jobId) {
       
    
        $query = "SELECT applications.application_id, applications.job_id, applications.freelancer_id, 
                  applications.application_text, applications.application_date, applications.status,
                  users.username, users.email
                  FROM applications
                  JOIN users ON applications.freelancer_id = users.user_id
                  WHERE applications.job_id = ?";
    
        $stmt = $connectionObject->prepare($query);
        $stmt->bind_param("i", $jobId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $applications = [];
    
        while ($row = $result->fetch_assoc()) {
            $applications[] = $row;
        }
    
        $stmt->close();
        $connectionObject->close();
    
        return $applications;
    }


    function updateApplicationStatus($connectionObject,$applicationId, $status) {
       
    
            $query = "UPDATE applications SET status = ? WHERE application_id = ?";
            $stmt = $connectionObject->prepare($query);
            $stmt->bind_param("si", $status, $applicationId);
            $stmt->execute();
            return true;

    }

    
    // Close connection
    function closeCon($connectionObject) {
        $connectionObject->close();
    }
}

?>
