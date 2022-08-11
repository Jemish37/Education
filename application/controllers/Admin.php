<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function loads($view, $data = [])
    {
        $this->load->view('admin/header', $data);
        $this->load->view('admin/' . $view, $data);
        $this->load->view('admin/footer', $data);
    }

    public function index()
    {
        $adminId = getAdmin();
        if ($adminId) {
            $data = [];
            $data["title"] = "Dashboard";
            $this->loads("dashboard", $data);
        } else {
            redirect(ADM . "/login");
        }
    }

    public function login()
    {
        $adminId = getAdmin();

        if ($adminId) {
            redirect(ADM);
        } else {
            $data = [];
            $data["title"] = "Login";
            $this->loads("login", $data);
        }
    }

    public function aboutSection()
    {
        $data = [];
        $aboutData = getRows("md5(id) as id, content_key, content_value", "contents", "content_key like 'about%'");
        $aboutData = array_column($aboutData, 'content_value', 'content_key');

        $data["data"] = $aboutData;
        $data["title"] = "About Section";
        $this->loads("about-section", $data);
    }

    public function sliderSection()
    {
        $data = [];
        $sliderData = getRows("md5(id) as id, title, title_2,description,date,attachment", "sliders", "1=1");

        $data["data"] = $sliderData;
        $data["title"] = "Slider Section";
        $this->loads("slider-section", $data);
    }

    public function updateAboutData()
    {

        $res = [false, [], 'Invalid request'];

        if ($_POST) {
            if (isset($_POST['about_text'])  && $_POST["about_text"] != "") {
                if (isset($_POST["about_video"]) && $_POST["about_video"] != "") {
                    $res[0] = true;
                    $res[2] = "Data Saved Successfully";

                    $data = [
                        [
                            'content_key' => 'about_text',
                            'content_value' => $_POST["about_text"]
                        ],
                        [
                            'content_key' => 'about_video',
                            'content_value' => $_POST["about_video"]
                        ]
                    ];

                    $this->db->update_batch('contents', $data, 'content_key');
                } else {
                    $res[2] = "About Video Link is Empty";
                }
            } else {
                $res[2] = "About Text is Empty";
            }
        }

        echo send_data($res);
    }

    public function course()
    {
        $data = [];
        $courseData = getRows("md5(id) as id, name, short_desc,long_desc,date,attachment,duration,price", "courses", "1=1");
        $data["data"] = $courseData;
        $data["title"] = "Courses";
        $this->loads("courses", $data);
    }

    public function addCourse($id = "")
    {
        $data = [];
        $data["title"] = "Add or Edit Course";

        if ($id != "") {
            $getData = getRow("md5(id) as id, name, short_desc,long_desc,date,attachment,duration,price", "courses", "md5(id) = '$id'");
            $data["data"] = $getData;
        }

        $this->loads("add-course", $data);
    }

    public function addCourseData()
    {
        $res = [false, [], 'Invalid request'];

        if ($_POST) {
            if (isset($_POST['name'])  && $_POST["name"] != "") {
                if (isset($_POST["shortDescription"]) && $_POST["shortDescription"] != "") {
                    if (isset($_POST["longDescription"]) && $_POST["longDescription"] != "") {
                        if (isset($_POST["duration"]) && $_POST["duration"] != "") {
                            if (isset($_POST["price"]) && $_POST["price"] != "") {
                                if (isset($_POST["id"]) && $_POST["id"] != "") {
                                    $updData = [
                                        "name" => $_POST["name"],
                                        "short_desc" => $_POST["shortDescription"],
                                        "long_desc" => $_POST["longDescription"],
                                        "duration" => $_POST["duration"],
                                        "price" => $_POST["price"],
                                    ];
                                    $id = update("courses", ["md5(id)" => $_POST['id']], $updData);
                                    if ($id) {
                                        $res[2] = "Course update Successfully";
                                        $res[0] = true;
                                    }
                                } else {
                                    $addData = [
                                        "name" => $_POST["name"],
                                        "short_desc" => $_POST["shortDescription"],
                                        "long_desc" => $_POST["longDescription"],
                                        "duration" => $_POST["duration"],
                                        "price" => $_POST["price"],
                                    ];
                                    $id = insert("courses", $addData);
                                    if ($id) {
                                        $res[2] = "Course added Successfully";
                                        $res[0] = true;
                                    }
                                }
                            } else {
                                $res[2] = "Course Price is Empty";
                            }
                        } else {
                            $res[2] = "Course Duration is Empty";
                        }
                    } else {
                        $res[2] = "Course Long Description is Empty";
                    }
                } else {
                    $res[2] = "Course Short Description is Empty";
                }
            } else {
                $res[2] = "Course Name is Empty";
            }
        }

        echo send_data($res);
    }

    public function addSliderData()
    {
        $res = [false, [], 'Invalid request'];

        if ($_POST) {
            if (isset($_POST['title'])  && $_POST["title"] != "") {
                if (isset($_POST["title2"]) && $_POST["title2"] != "") {
                    if (isset($_POST["description"]) && $_POST["description"] != "") {

                        if (!empty($_FILES['image']) && $_FILES['image']['name'] != '') {
                            if ($_FILES['image']['size'] > 0) {
                                $extt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                                if ($extt == "png" || $extt == "PNG" || $extt == "jpg" || $extt == "JPG" || $extt == "jpeg" || $extt == "JPEG") {
                                    $attachment = time() . '.' . $extt;
                                    move_uploaded_file($_FILES['file']['tmp_name'], "src/uploads/" . $attachment);

                                    $addData = [
                                        "title" => $_POST["title"],
                                        "title_2" => $_POST["title2"],
                                        "description" => $_POST["description"],
                                        "attachment" => $attachment,
                                    ];
                                    $id = insert("sliders", $addData);
                                    if ($id) {
                                        $res[2] = "Slider added Successfully";
                                        $res[0] = true;
                                    }
                                } else {
                                    $res[2] = 'Please choose valid png or jpg image';
                                }
                            } else {
                                $res[2] = "Invalid File";
                            }
                        }

                    } else {
                        $res[2] = "Course Long Description is Empty";
                    }
                } else {
                    $res[2] = "Course Short Description is Empty";
                }
            } else {
                $res[2] = "Course Name is Empty";
            }
        }

        echo send_data($res);
    }
}
