<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>pfSense Monitor</title>
    <link rel="stylesheet" href="/css/non-admin.css">
    <style>
    .responsive-video {
        position: relative;
        padding-bottom: 56.25%;
        overflow: hidden;
    }

    .responsive-video iframe,
    .responsive-video object,
    .responsive-video embed {
        position: absolute;
        margin: auto auto;
        width: 100%;
        height: 65%;
        margin-bottom: 20px;
    }
    h6 {
        color: white;
        font-size: 1.5em;
    }
    .alert {
        margin-bottom: 5px;
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="alert text-center">
            <h3 style="color:black!;"> Login to each Frame then hit refresh</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="responsive-video">
                    <div class="alert alert-success text-center">
                        <h6>192.168.0.3 GRAPH</h6>
                    </div>
                    <iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms"
                            src="https://192.168.0.3/graph.php?ifnum=lan&ifname=LAN" ></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="responsive-video">
                    <div class="alert alert-success text-center">
                        <h6>192.168.0.4 GRAPH</h6>
                    </div>
                    <iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms"
                            src="https://192.168.0.4/graph.php?ifnum=lan&ifname=LAN" ></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="responsive-video">
                    <div class="alert alert-success text-center">
                        <h6>192.168.0.2 GRAPH</h6>
                    </div>
                    <iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms"
                            src="https://192.168.0.2/graph.php?ifnum=lan&ifname=LAN" ></iframe>
                </div>
            </div>
            <div class="col-md-4">
                <div class="responsive-video">
                    <div class="alert alert-success text-center">
                        <h6>122.49.211.212 GRAPH</h6>
                    </div>
                    <iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms"
                            src="https://122.49.211.212/graph.php?ifnum=lan&ifname=LAN" ></iframe>
                </div>
            </div>
            <div class="col-md-4">
                <div class="responsive-video">
                    <div class="alert alert-success text-center">
                        <h6>122.49.211.218 GRAPH</h6>
                    </div>
                    <iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms"
                            src="https://122.49.211.218/graph.php?ifnum=lan&ifname=LAN" ></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="responsive-video">
                    <div class="alert alert-success text-center">
                        <h6>WIFI CITY GRAPH</h6>
                    </div>
                    <iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms"
                            src="http://203.82.32.28/cacti/plugins/realtime/graph_popup_rt.php?local_graph_id=2077" ></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="responsive-video">
                    <div class="alert alert-success text-center">
                        <h6>Eastern GRAPH</h6>
                    </div>
                    <img src="http://bandwidth20.eastern-tele.com/cacti/graph_image.php?action=view&local_graph_id=3178&rra_id=1" id="_etpi_graph" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>

    <script>
        var path = 'http://bandwidth20.eastern-tele.com/cacti/graph_image.php?action=view&local_graph_id=3178&rra_id=1',
        img = document.getElementById('_etpi_graph');
        setInterval( function() { img.src = path; console.log('changed'); }, 180000);
    </script>
</body>
</html>