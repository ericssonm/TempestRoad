(function(d, t, e, m){
    
    // Async Rating-Widget initialization.
    window.RW_Async_Init = function(){
                
        RW.init({
            huid: "268681",
            uid: "3cd08ba5286d461379bf21acf8c8b47b",
            source: "website",
            options: {
                "advanced": {
                    "layout": {
                        "align": {
                            "hor": "center",
                            "ver": "bottom"
                        },
                        "lineHeight": "12px"
                    },
                    "font": {
                        "hover": {
                            "color": "#FFFFFF"
                        },
                        "size": "11px",
                        "color": "#FFFFFF",
                        "type": "'Droid Sans', Helvetica, sans-serif"
                    },
                    "text": {
                        "rateAwful": "Terrible",
                        "ratePoor": "Poor",
                        "rateAverage": "Good",
                        "rateGood": "Great"
                    }
                },
                "label": {
                    "background": "#4d5662"
                },
                "size": "medium",
                "style": "crystal",
                "isDummy": false
            }  
        });
        RW.render();
    };
        // Append Rating-Widget JavaScript library.
    var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
        l = d.location, ck = "Y" + t.getFullYear() + 
        "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
        f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
        a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
    if (d.getElementById(id)) return;              
    rw = d.createElement(e);
    rw.id = id; rw.async = true; rw.type = "text/javascript";
    rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
    s.parentNode.insertBefore(rw, s);
    }(document, new Date(), "script", "rating-widget.com/"));


function change(){
    document.getElementById("view_form").submit();
}

function change2(){
    document.getElementById("sort_form").submit();
}

function change3(){
    document.getElementById("category_form").submit();
}



function update(){
    document.getElementById("update").submit();
}

