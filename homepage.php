<div>
    <div class="bg_slider">
        <div class="slider"></div>
        <div class="slider"></div>
        <div class="slider"></div>
        <div class="banner-text">Advanced Medicine Trusted Care</div>

        <div class='link_container'>
            <a href="sponsor_us.php" class="link_box">
                <div><i class="fa fa-handshake-o"></i><br>Sponsors and CROs </div>
            </a>
            <a href="patient.php" class="link_box">
                <div><i class="fa fa-stethoscope"></i><br>Patients / Study Participants </div>
            </a>
            <a href="Physcians.php" class="link_box">
                <div><i class="fa fa-user"></i><br>Physicians / MDs / DOs </div>
            </a>
        </div>
    </div>
    <div class='container'>
        <div class='about_box'>
            <div class='about_img'>
                <img src="images/doctor.jpg">
            </div>
            <div class='about_content'>  
                <h4>About Us</h4> 
                <p>We integrate with Doctor’s office flow and take care of all the details while protecting the integrity of patient’s data throughout 
                    the study and focusing on patient care. We become a partner in each patient’s care taking the management burden off the physician by 
                    taking care of the details — including patient recruitment, scheduling visits, processing paperwork, and handling data collection, 
                    regulatory compliance and sponsor communication.</p>
                <button onclick='changelocation()'>Read More</button>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function(){slides=0; setInterval(function(){slide_me();},4000);};

slide_me=()=>{
    slides++; 
    slider = document.getElementsByClassName('slider');
    if(slides >= slider.length){
        slides = 0;
    }
    for(i = 0; i < 3; i++){
        slider[i].style.opacity = "0%";    
    }
    slider[slides].style.opacity = "100%";
    slider[slides].style.transition = ".5s";
}

</script>