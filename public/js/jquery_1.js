const BASEURL = "/dictionary" 
$(document).ready(function(){
    $(".default_option").click(function(){
        $(".dropdown ul").toggleClass("active");
    });
    $(".dropdown ul li").click(function(){
        var str = $(this).text();
        $(".default_option").text(str);
        $(".dropdown ul").removeClass("active");
    });
    $("#toggle_close").click(function(){
        $("#toggle").click();
    });
    $(".default_option_1").click(function(){
        $(".dropdown_1 ul").toggleClass("active");
    });
    $("#opt").change(function(){
        $("#opt option:selected").each(function(){
            var choice = $(this).text()
            da = {
                'choice' : choice
            }
            $.ajax({
                type : "POST",
                url : BASEURL + "/Topic/formX",
                data : da,
                dataType : 'JSON'
            }).then(
                function(res){
                    console.log(res)
                    $(".body").html(res)
                },
                function(res){
                    console.log(res)                                  
                    alert('error')
                }
            )
        });
    });
    /*submit*/
    $(document).on('click', '#s-vocab', function (){
        vocab = $(".formClients input[name='vocab']").val()
        classifier = $(".classifier option:selected").text()
        mean_vocab = $(".formClients input[name='mean_vocab']").val()
        band = $(".band option:selected").text()
        syn = $(".formClients input[name='synonym']").val()    
        example = $(".formClients textarea[name='example']").val()
        topic = $(".category option:selected").val()
        da = {
            'vocab' : vocab,
            'classifier' : classifier,            
            'mean_vocab' : mean_vocab,
            'band' : band,
            'syn' : syn,
            'example' : example,
            'topic' : topic        
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Vocabulary/NewVocab",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                console.log(res)
                if(res == 1){
                    $(".formClients input[name='vocab']").val('')
                    $(".formClients input[name='classifier']").val('')
                    $(".formClients input[name='mean_vocab']").val('')                    
                    $(".formClients input[name='synonym']").val('')
                    $(".formClients textarea[name='example']").val('')                    
                    $("#result h2").text("Successful")
                } else {
                    alert('false')
                }
            },
            function(){
                alert('error')
            }
        )
    });
    $(document).on('click', '#s-collo', function (){
        collocation = $(".formClients input[name='collocation']").val()
        meaning_coll = $(".formClients input[name='meaning_coll']").val()
        example = $(".formClients textarea[name='example']").val()
        topic = $(".category option:selected").val() 
        da = {
            'collocation' : collocation,
            'meaning_coll' : meaning_coll,
            'example' : example,
            'topic' : topic        
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Collocation/NewCollo",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                console.log(res)
                if(res == 1){
                    $(".formClients input[name='collocation']").val('')
                    $(".formClients input[name='meaning_coll']").val('')
                    $(".formClients input[name='mean_vocab']").val('')
                    $(".formClients textarea[name='example']").val('')
                    $("#result h2").text("Successful")
                } else {
                    alert('false')
                }
            },
            function(){
                alert('error')
            }
        )
    });        
    $(document).on('click', '#s-idm', function (){
        idiom = $(".formClients input[name='idiom']").val()
        meaning_idm = $(".formClients input[name='meaning_idm']").val()        
        band = $(".band option:selected").text()
        example = $(".formClients textarea[name='example']").val()
        topic = $(".category option:selected").val() 
        da = {
            'idiom' : idiom,
            'meaning_idm' : meaning_idm,            
            'band' : band,
            'example' : example,
            'topic' : topic        
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Idiom/NewIdm",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                console.log(res)
                if(res == 1){
                    $(".formClients input[name='idiom']").val('')
                    $(".formClients input[name='meaning_idm']").val('')                    
                    // $(".formClients input[name='band']").val('')                    
                    $(".formClients textarea[name='example']").val('')
                    $("#result h2").text("Successful")
                } else {
                    alert('false')
                }
            },
            function(){
                alert('error')
            }
        )
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            reader = new FileReader();
            reader.onload = function (e) {
                $('img#img-chart').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).on('change', 'input#Img', function (){
        readURL(this);
    });
    $(document).on('click', '#s-wrt1', function (){
        title = $(".formClients input[name='title']").val()
        band = $(".formClients input[name='band']").val()
        report = $(".formClients textarea[name='report']").val()
        p_chart = $("img#img-chart").attr('src')
        topic = $(".category option:selected").val() 
        da = {
            'title' : title,
            'band' : band,
            'report' : report,
            'p_chart' : p_chart,
            'topic' : topic        
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Writing1/NewWrt1",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                console.log(res)
                if(res == 1){
                    $(".formClients input[name='title']").val('')
                    $(".formClients input[name='band']").val('')
                    $(".formClients textarea[name='report']").val('')
                    $(".formClients input[name='p_chart']").val('')
                    $("#result h2").text("Successful")
                } else {
                    alert('false')
                }
            },
            function(){
                alert('error')
            }
        )
    })
    $(document).on('click', '#s-wrt2', function (){
        title = $(".formClients input[name='title']").val()
        band = $(".formClients input[name='band']").val()
        essay = $(".formClients textarea[name='essay']").val()
        topic = $(".category option:selected").val() 
        da = {
            'title' : title,
            'band' : band,
            'essay' : essay,
            'topic' : topic        
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Writing2/NewWrt2",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                console.log(res)
                if(res == 1){
                    $(".formClients input[name='title']").val('')
                    $(".formClients input[name='band']").val('')
                    $(".formClients textarea[name='essay']").val('')                    
                    $("#result h2").text("Successful")
                } else {
                    alert('false')
                }
            },
            function(){
                alert('error')
            }
        )
    })
    $(document).on('click', '#s-topic', function (){
        topic = $(".formClients input[name='topic']").val()
        img = $("img#img-chart").attr('src')
        da = {
            'topic' : topic,                        
            'img' : img      
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Topic/NewTopic",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                console.log(res)
                if(res == 1){                    
                    $(".formClients input[name='topic']").val('')
                    $("#result h2").text("Successful")
                } else {
                    alert('false')
                }
            },
            function(){
                alert('error')
            }
        )
    })
    /*more*/
    $(document).on('click', '.more-vocab', function (){
        id = $(this).parent().attr("id_more")
        da = {
            'id_vocab' : id
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Vocabulary/Readmore",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                $("#read").html(res)
            },
            function(){
                alert('error')
            }
        )
    })
    $(document).on('click', '.more-collo', function (){
        id = $(this).parent().attr("id_more")
        da = {
            'id_collo' : id
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Collocation/Readmore",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                $("#read").html(res)
            },
            function(res){                
                alert('error')
            }
        )
    })
    $(document).on('click', '.more-idm', function (){
        id = $(this).parent().attr("id_more")
        da = {
            'id_idm' : id
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Idiom/Readmore",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                $("#read").html(res)
            },
            function(res){                
                alert('error')
            }
        )
    })
    $(document).on('click', '.more-wrt1', function (){
        id = $(this).parent().attr("id_more")    
        da = {
            'id_report' : id
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Writing1/Readmore",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                $(".col-sm-8").html(res)
            },
            function(res){    
                console.log(res)            
                alert('error')
            }
        )
    })
    $(document).on('click', '.more-wrt2', function (){
        id = $(this).parent().attr("id_more")    
        da = {
            'id_essay' : id
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Writing2/Readmore",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                $(".col-sm-8").html(res)
            },
            function(res){   
                console.log(res)             
                alert('error')
            }
        )
    })
    /*save*/
    $(document).on('click', '#save-vocab', function (){
        id = $(this).attr("id_save")
        vocab = $(".formClients input[name='vocab']").val()
        classifier = $(".classifier option:selected").text()
        mean_vocab = $(".formClients input[name='mean_vocab']").val()
        band = $(".band option:selected").text()
        syn = $(".formClients input[name='synonym']").val()
        example = $(".formClients textarea[name='example']").val()
        topic = $(".category option:selected").val()        
        da = {
            'id' : id,
            'vocab' : vocab,
            'classifier' : classifier,            
            'mean_vocab' : mean_vocab,
            'band' : band,
            'syn' : syn,
            'example' : example,
            'topic' : topic        
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Vocabulary/EditVocab",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                console.log(res)
                if(res == 1){
                    $("#result h2").text("Successful")
                } else {
                    alert('false')
                }
            },
            function(){
                alert('error')
            }
        )
    })
    $(document).on('click', '#save-collo', function (){
        id = $(this).attr("id_save")
        collocation = $(".formClients input[name='collocation']").val()        
        meaning_coll = $(".formClients input[name='meaning_coll']").val()        
        example = $(".formClients textarea[name='example']").val()
        topic = $(".category option:selected").val()
        da = {
            'id' : id,
            'collocation' : collocation,
            'meaning_coll' : meaning_coll,            
            'example' : example,
            'topic' : topic        
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Collocation/EditCollo",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                console.log(res)
                if(res == 1){
                    $("#result h2").text("Successful")
                } else {
                    alert('false')
                }
            },
            function(){
                alert('error')
            }
        )
    })
    $(document).on('click', '#save-idm', function (){
        id = $(this).attr("id_save")
        idiom = $(".formClients input[name='idiom']").val()        
        meaning_idm = $(".formClients input[name='meaning_idm']").val()
        band = $(".band option:selected").val()
        example = $(".formClients textarea[name='example']").val()
        topic = $(".category option:selected").val()    
        da = {
            'id' : id,
            'idiom' : idiom,            
            'meaning_idm' : meaning_idm,
            'band' : band,
            'example' : example,
            'topic' : topic        
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Idiom/EditIdm",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                console.log(res)
                if(res == 1){
                    $("#result h2").text("Successful")
                } else {
                    alert('false')
                }
            },
            function(){
                alert('error')
            }
        )
    })
    $(document).on('click', '#save-wrt1', function (){
        id = $(this).attr("id_save")
        title = $(".formClients input[name='title']").val()
        p_chart = $("img#img-chart").attr('src')
        report = $(".formClients textarea[name='content_rep']").val()        
        band = $(".formClients input[name='band']").val()        
        topic = $(".category option:selected").val()    
        da = {
            'id' : id,
            'title' : title,
            'p_chart' : p_chart,
            'report' : report,
            'band' : band,            
            'topic' : topic        
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Writing1/EditWrt1",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                console.log(res)
                if(res == 1){
                    $("#result h2").text("Successful")
                } else {
                    alert('false')
                }
            },
            function(){
                alert('error')
            }
        )
    })
    $(document).on('click', '#save-wrt2', function (){
        id = $(this).attr("id_save")
        title = $(".formClients input[name='title']").val()        
        essay = $(".formClients textarea[name='content_essay']").val()        
        band = $(".formClients input[name='band']").val()        
        topic = $(".category option:selected").val()    
        da = {
            'id' : id,
            'title' : title,        
            'essay' : essay,
            'band' : band,            
            'topic' : topic        
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Writing2/EditWrt2",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                console.log(res)
                if(res == 1){
                    $("#result h2").text("Successful")
                } else {
                    alert('false')
                }
            },
            function(){
                alert('error')
            }
        )
    })
    $(document).on('click', '#save-tp', function (){
        id = $(this).attr("id_save")
        topic = $(".formClients input[name='topic']").val()
        img = $("img#img-chart").attr('src')
        da = {
            'id' : id,
            'img' : img,         
            'topic' : topic        
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/Topic/EditTopic",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                console.log(res)
                if(res == 1){
                    $("#result h2").text("Successful")
                } else {
                    alert('false')
                }
            },
            function(){
                alert('error')
            }
        )
    })
    $(document).on('click', '.done', function () {
        var band = 'all';
        var topic = 'all'
        var type = $('.col-sm-8 h2').text()
        
        $(".cb-band").each(function(){
            if($(this).is(":checked"))
            {
                band = $(this).val()
            }
        })
        $(".cb-topic").each(function(){
            if($(this).is(":checked"))
            {
                topic = $(this).val()
            }
        })  
        da = {            
            'band' : band,         
            'topic' : topic        
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/"+ type +"/Sort",
            data : da,
            dataType : 'JSON'
        }).then(
            function(response){
                for (i = 0; i < response.length; i++) {
                    $("#home .col-sm-4 ul").html(response[i])
                }
            },
            function(){
                alert('error')
            }
        )
    })
    $(document).on('keyup', '.search_field', function () {
        value = $(".search_field input").val()
        typee = $(".default_option").text()
        href = BASEURL + "/" + typee + "/" + "info" + typee + "Name/" + value;
        $(".search_field a").attr('href', href);                
    })
    $(document).on('click', '.dropdown ul li', function () {
        value = $(".search_field input").val()
        typee = $(".default_option").text()
        href = BASEURL + "/" + typee + "/" + "info" + typee + "Name/" + value;
        $(".search_field a").attr('href', href);              
    })
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".box_long").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    })
    $(document).on('click', '.submit-signup', function () {
        username = $(".formBx input[name='crusername']").val()
        email = $(".formBx input[name='email']").val()
        crpassword = $(".formBx input[name='crpassword']").val()        
        cfpassword = $(".formBx input[name='cfpassword']").val()
        da = {
            'username' : username,
            'email' : email,         
            'crpassword' : crpassword,            
            'cfpassword' : cfpassword
        }
        $.ajax({
            type : "POST",
            url : BASEURL + "/User/NewUser",
            data : da,
            dataType : 'JSON'
        }).then(
            function(res){
                console.log(res)
                if(res == 1){
                    $("#register-result").text("Successful")
                    $(".formBx input[name='crusername']").val('')
                    $(".formBx input[name='email']").val('')
                    $(".formBx input[name='crpassword']").val('')  
                    $(".formBx input[name='cfpassword']").val('')   
                }else if(res == "Error-Password")
                {
                    $("#register-result").text("Create password and confirm password must be the same.")   
                }else if(res == "Error-Username")
                {
                    $("#register-result").text("This username has been already used.")   
                } else {
                    alert('false')
                }
            },
            function(){
                alert('error')
            }
        )  
    })
});

loadTopics = function () {
    $.ajax({
        type: "POST",   
        url: BASEURL + "/Topic/show",
        dataType: 'JSON'
    }).then(
        function (response) {
            for (i = 0; i < response.length; i++) {
                $(".section").append(response[i])
            }
        },
        function () {
            alert('There was some error!');
        }
    )
}
loadVocabs = function () {
    $.ajax({
        type: "POST",   
        url: BASEURL + "/Vocabulary/show",
        dataType: 'JSON'
    }).then(
        function (response) {
            for (i = 0; i < response.length; i++) {
                $("#home .col-sm-4").append(response[i])
            }
        },
        function () {
            alert('There was some error!');
        }
    )
}
loadCollos = function () {
    $.ajax({
        type: "POST",   
        url: BASEURL + "/Collocation/show",
        dataType: 'JSON'
    }).then(
        function (response) {
            for (i = 0; i < response.length; i++) {
                $("#home .col-sm-4").append(response[i])
            }
        },
        function () {
            alert('There was some error!');
        }
    )
}
loadIdms = function () {
    $.ajax({
        type: "POST",   
        url: BASEURL + "/Idiom/show",
        dataType: 'JSON'
    }).then(
        function (response) {
            for (i = 0; i < response.length; i++) {
                $("#home .col-sm-4").append(response[i])
            }
        },
        function () {
            alert('There was some error!');
        }
    )
}
loadWrt1 = function () {
    $.ajax({
        type: "POST",   
        url: BASEURL + "/Writing1/show",
        dataType: 'JSON'
    }).then(
        function (response) {
            for (i = 0; i < response.length; i++) {
                $("#home .col-sm-4").append(response[i])
            }
        },
        function () {
            alert('There was some error!');
        }
    )
}
loadWrt2 = function () {
    $.ajax({
        type: "POST",   
        url: BASEURL + "/Writing2/show",
        dataType: 'JSON'
    }).then(
        function (response) {
            for (i = 0; i < response.length; i++) {
                $("#home .col-sm-4").append(response[i])
            }
        },
        function () {
            alert('There was some error!');
        }
    )
}
function goBack() {
    window.history.back();
}
function toggleForm() {
    var container = document.querySelector('.container');
    container.classList.toggle('active')
}
