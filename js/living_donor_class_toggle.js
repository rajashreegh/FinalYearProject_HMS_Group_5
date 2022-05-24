
$(".row .col .card").on("click",function(){
    $(".row .col .card.active").removeClass("active");
    $(this).addClass("active");
});
$("#read-btn").on("click",function(){
    $("#read_tab").removeClass("active");
    $("#read_tab").addClass("bg-success");
    $("#read_tab").addClass("text-white");
    $("#personal_tab").addClass("active");
    $("#read-icon").removeClass("fa-info-circle");
    $("#read-icon").addClass("fa-check-circle");
});
$("#personal-btn").on("click",function(){
    $("#personal_tab").removeClass("active");
    $("#personal_tab").addClass("bg-success");
    $("#personal_tab").addClass("text-white");
    $("#contact_tab").addClass("active");
    $(".personal-sec").prop('readonly', true); 
    $("#personal-icon").removeClass("fa-info-circle");
    $("#personal-icon").addClass("fa-check-circle"); 
})
$("#contact-btn").on("click",function(){
    $("#contact_tab").removeClass("active");
    $("#contact_tab").addClass("bg-success");
    $("#contact_tab").addClass("text-white");
    $("#emergency_tab").addClass("active");
    $(".contact-sec").prop('readonly', true); 
    $("#contact-icon").removeClass("fa-info-circle");
    $("#contact-icon").addClass("fa-check-circle"); 
})
$("#emergency-btn").on("click",function(){
    $("#emergency_tab").removeClass("active");
    $("#emergency_tab").addClass("bg-success");
    $("#emergency_tab").addClass("text-white");
    $("#declaration_tab").addClass("active");
    $(".emergency-sec").prop('readonly', true); 
    $("#emergency-icon").removeClass("fa-info-circle");
    $("#emergency-icon").addClass("fa-check-circle"); 
})

function showRead(){
    document.getElementById("read_section").style.display="block";
    document.getElementById("personal_section").style.display="none";
    document.getElementById("contact_section").style.display="none";
    document.getElementById("emergency_section").style.display="none";
    document.getElementById("declaration_section").style.display="none";
}
function showPersonal(){
    document.getElementById("read_section").style.display="none";
    document.getElementById("personal_section").style.display="block";
    document.getElementById("contact_section").style.display="none";
    document.getElementById("emergency_section").style.display="none";
    document.getElementById("declaration_section").style.display="none";
}

function showContact(){
    document.getElementById("read_section").style.display="none";
    document.getElementById("personal_section").style.display="none";
    document.getElementById("contact_section").style.display="block";
    document.getElementById("emergency_section").style.display="none";
    document.getElementById("declaration_section").style.display="none";
}

function showEmergency(){
    document.getElementById("read_section").style.display="none";
    document.getElementById("personal_section").style.display="none";
    document.getElementById("contact_section").style.display="none";
    document.getElementById("emergency_section").style.display="block";
    document.getElementById("declaration_section").style.display="none";
}
function showDeclaration(){
    document.getElementById("read_section").style.display="none";
    document.getElementById("personal_section").style.display="none";
    document.getElementById("contact_section").style.display="none";
    document.getElementById("emergency_section").style.display="none";
    document.getElementById("declaration_section").style.display="block";
}

$(document).ready(function(){
    $('#organAll').on("click",function(){
        $('.organ-options').prop('checked',this.checked);
    });
});
$(document).ready(function(){
    $('#tissueAll').on("click",function(){
        $('.tissue-options').prop('checked',this.checked);
    });
});
$(document).ready(function(){
    $('#diseaseAll').on("click",function(){
        $('.disease-options').prop('checked',this.checked);
    });
});

$('.personal-sec').on('click',function(){
    var empty = false;
    $('.personal-sec').each(function(){
        console.log($(this).val());
        if($(this).val()==''){
            empty=true;
        }
    });
    if(empty){
        $('#personal-btn').attr('disabled','disabled');
    }
    else{
        $('#personal-btn').removeAttr('disabled');
    }
});

$('.contact-sec').keyup(function(){
    var empty = false;
    $('.contact-sec').each(function(){
        console.log($(this).val());
        if($(this).val()==''){
            empty=true;
        }
    })
    if(empty){
        $('#contact-btn').attr('disabled','disabled');
    }
    else{
        $('#contact-btn').removeAttr('disabled');
    }
})

$('.emergency-sec').keyup(function(){
    var empty = false;
    $('.emergency-sec').each(function(){
        console.log($(this).val());
        if($(this).val()==''){
            empty=true;
        }
    });
    if(empty){
        $('#emergency-btn').attr('disabled','disabled');
    }
    else{
        $('#emergency-btn').removeAttr('disabled');
    }
});
