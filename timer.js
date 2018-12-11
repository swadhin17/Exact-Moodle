var seconds = 300;
      function secondPassed() {
          var minutes = Math.round((seconds - 30)/60),
              remainingSeconds = seconds % 60;

          if (remainingSeconds < 10) {
              remainingSeconds = "0" + remainingSeconds;
          }

          document.getElementById('otp_button').innerHTML = minutes + " : " + remainingSeconds + " minutes";
          if (seconds == 0) {
              clearInterval(countdownTimer);
              
            
//              alert(warning);
              
          } else {
              seconds--;
          }
      }
      var countdownTimer = setInterval('secondPassed()', 1000);