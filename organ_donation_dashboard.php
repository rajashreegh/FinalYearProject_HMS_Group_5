<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Organ Donation | CareVista</title>
	<link rel="shortcut icon" href="IMAGES/img2/Logo.png" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/organ_donation_dashboard.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Passions+Conflict&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Neonderthaw&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quintessential&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script src="https://kit.fontawesome.com/12fd2f4021.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'includes/organ_donation_navbar.php'; ?>
    
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 carousel-pic" src="IMAGES/organ_donation/pic1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 carousel-pic" src="IMAGES/organ_donation/pic2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 carousel-pic" src="IMAGES/organ_donation/pic3.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block register-div">
                        <div class="cards">
                            <div class="card-header reg-btn">Living Organ Donation</div>
                            <div class="card-body">
                                <p class="card-text">Donate while you are alive...</p>
                                <a href="organ_donor_reg.php?donation_type=Living" class="btn bclr"><i class="fas fa-user-plus"></i>   Pledge Now</a>
                            </div>
                        </div>
                        <div class="cards" style="left:45%;">
                            <div class="card-header reg-btn">Deceased Organ Donation</div>
                            <div class="card-body">
                                <p class="card-text">Donate your organs after death....</p>
                                <a href="organ_donor_reg.php?donation_type=Deceased" class="btn bclr"><i class="fas fa-user-plus"></i>   Pledge Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="container-fluid px-4 mt-4">
            
            <div class="row">
                <div class="col-md-3 mx-4 scroll-bg"  data-spy="scroll" data-offset="60" style="overflow-y: scroll; height:690px;">
                    <div class="row flex-column text-center myths">
                        <div class="col-md-12 mt-4">
                            <!-- <img src="IMAGES/organ_donation/myths-facts.jpg" class="myth-img"> -->
                        </div>
                        <div class="col-md-12 mt-4 text-primary">
                            <img src="IMAGES/organ_donation/organ_scarcity.jpg" class="img-circle"><br><br>
                            <h5>Myth #1: "There are enough organs for those who need them"</h5>
                            <p><b>FACT:</b> More than 112,000 people are waiting for a lifesaving transplant. Someone is added to the waitlist every 10 minutes, and 22 patients die every day because the organ they needed wasn't donated in time. </p>
                        </div>
                        <div class="col-md-12 mt-4 text-success">
                            <img src="IMAGES/organ_donation/living_donor.jpg" class="img-circle"><br><br>
                            <h5>Myth #2: "Only the deceased can donate organs"</h5>
                            <p><b>FACT:</b> Living donors are crucial. The popularity of living-organ donation—particularly for kidneys—has increased a lot in recent years, as people become more aware of what a difference it makes. A living-donor organ can last 10-20 years or even more.</p>
                        </div>
                        <div class="col-md-12 mt-4 text-info">
                            <img src="IMAGES/organ_donation/religion.jpg" class="img-circle"><br><br>
                            <h5>Myth #3: "Many religions forbid organ donation"</h5>
                            <p><b>FACT:</b> Most religions encourage organ donation as an act of love and compassion. Giving an organ means giving life, and that's deeply meaningful for people of faith.</p>
                        </div>
                        <div class="col-md-12 mt-4 text-danger">
                            <img src="IMAGES/organ_donation/kidney.jpg" class="img-circle"><br><br>
                            <h5>Myth #5: "Kidney donors have to be family members"</h5>
                            <p><b>FACT:</b> Many donors are altruistic. Doctors match the donor to the patient using various criteria, including blood type. Research keeps bringing new breakthroughs to improve organ transplantation and manage possible problems, such as blood-type compatibility. </p>
                        </div>
                    </div>
                </div>
                <div class="col px-4 text-center">
                    <div class="card mt-2 card-shadow">
                        <div class="row mx-auto">
                        <div class="col-md-5 col-bg-2 text-center align-items-center">
                            <div class="row text-center justify-content-center align-items-center mt-4 mx-4">
                                <p>Need Organs?? Request For Organs now!!!</p>
                                <a href="organ_recepient_reg.php" class="btn btn-primary btn-font"><i class="fas fa-user-plus"></i>   Register Now</a>
                            </div>
                            <div class="row text-center justify-content-center align-items-center mt-4">
                                <p>Pledge Yourself as a Living Organ Donor</p>
                                <a href="organ_donor_reg.php?donation_type=Living" class="btn btn-primary btn-font"><i class="fas fa-user-plus"></i>   Pledge Now</a>
                            </div>
                            <div class="row text-center justify-content-center align-items-center mt-4">
                                <p>Pledge Yourself as a Deceased Organ Donor</p>
                                <a href="organ_donor_reg.php?donation_type=Deceased" class="btn btn-primary btn-font"><i class="fas fa-user-plus"></i>   Pledge Now</a>
                            </div>
                            <div class="row text-center justify-content-center align-items-center mt-4 mb-4">
                                <p>Changed your mind after registration??</p>
                                <a href="#" data-toggle="modal" data-target="#unpledge_donor" class="btn btn-primary btn-font"><i class="fas fa-user-plus"></i>   Unpledge Now</a>
                            </div>
                        </div>
                        <div class="col-md-7 col-bg text-center align-items-center">
                            <div class="row text-center">
                                <div class="col-md-12">
                                        <!-- <img class="card-img-top" src="IMAGES/organ_donation/card_pic_1.jpg" alt="Card image cap"> -->
                                        <div class="card-body text-white text_1">
                                            There is a wide gap between patients who need transplants and the organs that are available in India. 
                                            An estimated around 1.8 lakh persons suffer from renal failure every year, however the number of renal transplants done is around 6000 only.<br>
                                            <a href="#" data-toggle="modal" data-target="#readModal_1">Read More...</a>
                                        </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    
                                        <!-- <img class="card-img-top" src="IMAGES/organ_donation/card_pic_2.jpg" alt="Card image cap"> -->
                                        <div class="card-body text-white">
                                            There are two types of organ donation: Living and Deceased Organ Donation. Living donation offers another choice for transplant candidates, and it saves two lives: the recipient and the next one on the deceased organ waiting list. In deceased sonation, At the end of your life, you can give life to others.<br>
                                            <a href="#" data-toggle="modal" data-target="#readModal_2">Read More...</a>
                                        </div>
                                </div>
                            </div>
                                         
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <!-- <img class="card-img-top" src="IMAGES/organ_donation/card_pic_3.jpg" alt="Card image cap"> -->
                                    <div class="card-body text-white">
                                        Know More about organ donation and related queries.<br>
                                        <a href="#" data-toggle="modal" data-target="#readModal_3">Read More...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    
                </div>

            </div>
            
                <div class="text-center">
                    <img src="IMAGES/organ_donation/Organ-and-Tissue-donation-Process.png" class="img-fluid mx-auto d-block process">
                </div>

        </div>
        <footer class="bg-dark text-center text-white mt-4">
            <!-- Grid container -->
            <div class="container p-4">
                <!-- Section: Social media -->
                <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-facebook-f"></i
                ></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-twitter"></i
                ></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-google"></i
                ></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-instagram"></i
                ></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-linkedin-in"></i
                ></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-github"></i
                ></a>
                </section>
                <section class="mb-4">
                    <p>
                        <strong>Quick Links</strong> <a href="#" data-toggle="modal" data-target="#readModal_2">Types of Donation</a> | <a href="organ_donor_reg.php?donation_type=Living">Living Donor Pledge</a> |  <a href="organ_donor_reg.php?donation_type=Deceased"s>Deceased Donor Pledge</a> | 
                        <a href="#" data-toggle="modal" data-target="#unpledge_donor">Unpledge</a> | <a href="#" data-toggle="modal" data-target="#readModal_3">FAQ</a>
                    </p>
                </section>
            </div>
        </footer>
        <div class="modal fade" id="unpledge_donor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-bg-title text-center">
                        <h5 class="modal-title text-white" id="exampleModalLongTitle">Unpledge Now</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-2 mx-4">
                            <form action="unpledge_donor.php" method="POST">
                                <div class="form-row mt-4">
                                    <label for="donation_type"><b>Type of organ donor</b><span class="required">*</span></label><br>
                                        <select id="donation_type" name="donation_type" class="personal-sec" required>
                                            <option value="none" selected disabled hidden>--SELECT--</option>
                                            <option value="Living">Living</option>
                                            <option value="Deceased">Deceased</option>
                                        </select>
                                </div>
                                <div class="form-row mt-4">
                                    <label for="donor_reg_id"><b>Enter your Donor Registration Number</b><span class="required">*</span></label>
                                    <input type="text" class="form-control" id="donor_reg_id" name="donor_reg_id" placeholder="Enter Registration Number" required>
                                </div>
                                <div class="form-row mt-4">
                                    <label for="unpledge_reason"><b>Reason why you want to Unpledge</b><span class="required">*</span></label>
                                    <textarea class="form-control" id="unpledge_reason" name="unpledge_reason" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success text-center mt-4" style="width:100%;">UNPLEDGE</button>
                            </form>
                        </div>
                                                
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade bd-example-modal-lg" id="readModal_1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-bg-title">
                        <h5 class="modal-title text-white" id="exampleModalLongTitle">Know about Organ Donation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-img-1">
                        An estimated 2 lac patients die of liver failure or liver cancer annually in India, about 10-15% of which can be saved with a timely liver transplant. 
                        Hence about 25-30 thousand liver transplants are needed annually in India but only about one thousand five hundred are being performed. 
                        Similarly about 50000 persons suffer from Heart failures annually but only about 10 to 15 heart transplants are performed every year in India.  
                        In case of Cornea, about 25000 transplants are done every year against a requirement of 1 lakh.<br><br>
                        Organ Donation Day is observed every year on 13th of August. Due to lack of awareness, there are myths and fears in peoples’mind about organ donation. The aim of this day is to motivate normal human beings to pledge to donate organs after death, and to spread awareness about the importance of organ donation.
                        Organ Donation is donating a donor's organs like heart, liver, kidneys, intestines, lungs, and pancreas, after the donor dies, for the purpose of transplanting them into another person who is in need of an organ.
                        According to a survey In India every year about:<br>
                        500,000 people die because of non-availability of organs, 200,000 people die due to liver disease, and 50,000 people die because of heart disease. Moreover, 150,000 people await a kidney transplant but only 5,000 get among them.
                        The organ donor can play a big role in saving others’ life. The organ of the donor can be transplanted to the patient who needs it urgently. <br>
                                                
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="readModal_2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-bg-title">
                        <h5 class="modal-title text-white" id="exampleModalLongTitle">Types of Organ Donation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-img-2">
                        There are two types of organ donation:<br><br>
                            <ol>
                                <li> 
                                    <b><u>Living Donor Organ Donation</u>:</b> A person during his life can donate one kidney (the other kidney is capable of maintaining the body functions adequately for the donor), a portion of pancreas (half of the pancreas is adequate for sustaining pancreatic functions) and a part of the liver (the segments of liver will regenerate after a period of time in both recipient and donor).
                                    Living Donor is any person not less than 18 years of age, who voluntarily authorizes the removal of any of his organ and/or tissue, during his or her lifetime, as per prevalent medical practices for therapeutic purposes.
                                    Types of living organ donation are:-<br><br>
                                    <ul>
                                        <li><em><b>Living Near Related Donors:</b> Only immediate blood relations are accepted usually as donors viz., parents, siblings, children, grandparents and grandchildren (THOA Rules 2014). Spouse is also accepted as a living donor in the category of near relative and is permitted to be a donor.</em></li>
                                        <li><em><b>Living Non- near relative Donors:</b> These are other than near relative of recipient or patient. They can donate only for the reason of affection and attachment towards the recipient or for any other special reason.</em></li>
                                        <li><em><b>SWAP Donors:</b> In those cases, where the living near-relative donor is incompatible with the recipient, provision for swapping of donors between two such pairs exists, when donor of first pair matches with the second recipient and donor of second pair matches with the first recipient This is permissible only for near relatives as donors.</em></li>
                                    </ul>
                                </li><br>
                                <li>
                                    <b><u>Deceased Donor Organ Donation</u>:</b> A person can donate multiple organ and tissues after (brain-stem/cardiac) death. His/her organ continues to live in another person’s body.
                                    Deceased Donor is anyone, regardless of age, race or gender can become an organ and tissue donor after his or her Death (Brainstem/Cardiac). Consent of near relative or a person in lawful possession of the dead body is required. If the deceased donor is under the age of 18 years, then the consent required from one of the parent or any near relative authorized by the parents is essential. Medical suitability for donation is determined at the time of death.
                                </li>
                            </ol>                     
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg" id="readModal_3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header modal-bg-title">
                        <h5 class="modal-title text-white" id="exampleModalLongTitle"><span class="iconify" data-icon="mdi:frequently-asked-questions"></span>    FAQS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-img-3">
                        <ol>
                                <li>
                                    <h5>Is there any age limit for Organ Donation?</h5><br>
                                    <p>
                                         Age limit for Organ Donation varies, depending upon whether it is living donation or cadaver donation; for example in living donation, person should be above 18 year of age, and for most of the organs deciding factor is the person's physical condition and not the age. Specialist healthcare professionals decide which organs are suitable case to case. Organs and tissue from people in their 70s and 80s have been transplanted successfully all over the world. In the case of tissues and eyes, age usually does not matter. A deceased donor can generally donate the Organs & Tissues with the age limit of:
                                            <ul>
                                                <li>Kidneys, liver : up-to 70 years</li>
                                                <li>Heart, lungs : up-to 50 years</li>
                                                <li>Pancreas, Intestine : up-to 60-65 years</li>
                                                <li>Corneas, skin : up-to 100 years</li>
                                                <li>Heart valves : up-to 50 years</li>
                                                <li>Bone : up-to 70 years</li>
                                            </ul>
                                    </p>
                                </li><br><br>
                                <li>
                                    <h5>Do I need to carry my donor card always?</h5><br>
                                    <p>
                                        Yes, it will be helpful for the health professionals and your family.
                                    </p>
                                </li><br><br>
                                <li>
                                    <h5>Do I need to register my pledge with more than one Organisation?</h5><br>
                                    <p>
                                        No, if you have already pledged with one Organisation & received a Donor Card, you need not register with any other organisation.
                                    </p>
                                </li><br><br>
                                <li>
                                    <h5>Can a person, without a family, register for pledge?</h5><br>
                                    <p>
                                        Yes, you can pledge, but you need to preferably inform the person closest to you in life, a friend of long standing or a close colleague, about your decision of pledging. To fulfill your donation wishes, healthcare professionals will need to speak to someone else at the time of your death for the consent.
                                    </p>
                                </li><br><br>
                                <li>
                                    <h5>If I had pledged before, can I change my mind to un-pledge?</h5><br>
                                    <p>
                                        Yes, you can unpledge from this page by providing your registration number. Also, let your family know that you have changed your mind regarding organ donation pledge.
                                    </p>
                                </li><br><br>
                                <li>
                                    <h5>Are donors screened to identify if they have a transmissible disease?</h5><br>
                                    <p>
                                        Yes, Blood is taken from all potential donors and tested to rule out transmissible diseases and viruses such as HIV and hepatitis. The family of the potential donor is made aware that this procedure is required.
                                    </p>
                                </li><br><br>
                                <li>
                                    <h5>Can I be a donor if I have an existing medical condition?</h5><br>
                                    <p>
                                        Yes, in most circumstances you can be a donor. Having a medical condition does not necessarily prevent a person from becoming an organ or tissue donor. The decision about whether some or all organs or tissue are suitable for transplant is made by a healthcare professional, taking into account your medical history.
                                        <br><br>In very rare cases, the organs of donors with HIV or hepatitis-C have been used to help others with the same conditions. This is only ever carried out when both parties have the condition. All donors have rigorous checks to guard against infection.
                                    </p>
                                </li><br><br>
                                <li>
                                    <h5>Can I be an organ donor, if I have been rejected to donate blood?</h5><br>
                                    <p>
                                        Yes, The decision about whether some or all organs or tissue are suitable for transplant is always made by a specialist, taking into account your medical history. There may be specific reasons why it has not been possible to donate blood, such as having anemia or had a blood transfusion or had hepatitis in the past or there may be reasons why you could not donate blood because of your health at the time - sometimes a simple thing like a cold or medication that you are taking can prevent you from donating blood.
                                    </p>
                                </li><br><br>
                                <li>
                                    <h5>How does whole body donation differ from organ donation?</h5><br>
                                    <p>
                                        Organ donation for therapeutic purposes is covered under the Transplantation of Human Organs Act (THOA 1994). Whole body donation is covered by the Anatomy Act 1984.<br><br>
                                        Organ and Tissue donation is defined as the act of giving life to others after death by donating his/her organs to the needy suffering from end stage organ failure.<br><br>
                                        Body donation is defined as the act of giving oneӳ body after death for medical research and education. Those donated cadavers remain a principal teaching tool for anatomists and medical educators teaching gross anatomy.
                                    </p>
                                </li><br><br>
                                <li>
                                    <h5>Can a dead body be left for medical education or research after the organs have been retrieved for donation?</h5><br>
                                    <p>
                                        No, Bodies are not accepted for teaching purposes if organs have been donated or if there has been a post-mortem examination. However, if only the corneas are to be donated, a body can be left for research.
                                    </p>
                                </li>
                            </ol>                       
                    </div>
                </div>
            </div>
        </div>
        

        
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
    
    <script type="text/javascript">
            $(".nav li a").on("click",function(){
                $(".nav li a.active").removeClass("active");
                $(this).addClass("active");
            })
    </script>
    <?php
        if(isset($_SESSION['status']) && $_SESSION['status']!='')
        {
    ?>
            <script type="text/javascript">
                swal({
                    title: "<?php echo $_SESSION['status'];?>",
                    icon: "<?php echo $_SESSION['status_code'];?>",
                    text: "<?php echo $_SESSION['status_text'];?>",
                    button: "OK",
                });
            </script>
    <?php
        unset($_SESSION['status']);
        }
    ?> 
</body>
</html>
