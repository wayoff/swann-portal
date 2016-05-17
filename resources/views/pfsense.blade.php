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
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            
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

            <div class="col-md-6">
                <div class="responsive-video">
                    <div class="alert alert-success text-center">
                        <h6>122.49.211.212 GRAPH</h6>
                    </div>
                    <iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms"
                            src="https://122.49.211.212/graph.php?ifnum=lan&ifname=LAN" ></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="responsive-video">
                    <div class="alert alert-success text-center">
                        <h6>122.49.211.218 GRAPH</h6>
                    </div>
                    <iframe sandbox="allow-same-origin allow-scripts allow-popups allow-forms"
                            src="https://122.49.211.218/graph.php?ifnum=lan&ifname=LAN" ></iframe>
                </div>
            </div>
        </div>
    </div>
</body>
</html>