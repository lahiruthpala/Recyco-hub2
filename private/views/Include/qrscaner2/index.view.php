<html>

<head>
  <title>Instascan &ndash; Demo</title>
  <link rel="icon" type="image/png" href="favicon.png">
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>
  <a href="https://github.com/schmich/instascan"><img
      style="position: absolute; top: 0; right: 0; border: 0; z-index: 1"
      src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67"
      alt="Fork me on GitHub"
      data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>
  <div id="app">
    <div class="sidebar">
      <section class="cameras">
        <h2>Cameras</h2>
        <ul>
          <li v-if="cameras.length === 0" class="empty">No cameras found</li>
          <li v-for="camera in cameras">
            <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{
              formatName(camera.name) }}</span>
            <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
              <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
            </span>
          </li>
        </ul>
      </section>
      <section class="scans">
        <h2>Scans</h2>
        <ul v-if="scans.length === 0">
          <li class="empty">No scans yet</li>
        </ul>
        <transition-group name="scans" tag="ul">
          <li v-for="scan in scans" :key="scan.date" :title="scan.content">{{ scan.content }}</li>
        </transition-group>
      </section>
      <button onclick="redirect()">ADD</button>
    </div>
    <div class="preview-container">
      <video id="preview"></video>
    </div>
  </div>
  <script type="text/javascript" src="app.js"></script>
  <script>
    // Variable to store the content value
    var scanContents = [];

    // Function to get URL parameters by name
    function getParameterByName(name, url) {
      if (!url) {
        url = window.location.href;
      }
      name = name.replace(/[\[\]]/g, "\\$&");
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    // Function to set scanContent
    function setScanContent(content) {
      scanContents.push(content);
      console.log(scanContents);
    }

    // Function to redirect to the assigned table
    function redirect() {
      if (scanContents !== "") {
        var batchID = getParameterByName('Batch_ID');
        var url = 'http://localhost:8380/Recyco-hub2/public/table/CreateSortingJobs/' +'/' + scanContents;
        window.location.href = url;
      } else {
        alert("Scan content is empty.");
      }
    }
  </script>

</body>

</html>