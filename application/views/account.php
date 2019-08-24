<div class="centered">
     <div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'Profile')" id="defaultOpen">Profile</button>
  <button class="tablinks active" onclick="openCity(event, 'Payment')" id="defaultOpen">Payment</button>
</div>

<div id="Profile" class="tabcontent">
  <h3>Welcome <?php echo $user['name']; ?>!</h3>
    <div class="account-info">
        <p><b>Name: </b><?php echo $user['name']; ?></p>
        <p><b>Email: </b><?php echo $user['email']; ?></p>
        <p><b>Phone: </b><?php echo $user['phone']; ?></p>
        <p><b>Gender: </b><?php echo $user['gender']; ?></p>
    </div>
</div>
<div id="Payment" class="tabcontent">
    <div class="account-info">
        <table>
            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Name</th>
                    <th>Transaction_id</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach( $payment_list as $payment)
                { ?>
                    <tr>
                        <td><?php echo $payment['id'] ?></td>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $payment['trasaction_id'] ?></td>
                        <td><?php echo $payment['product_amount'] ?></td>
                        <td><?php echo ($payment['payment_status'] == 1) ? 'Success' : 'Failed'; ?></td>
                        <td><?php echo date('d-m-Y H:i:s', strtotime($payment["posted_date"])); ?></td>
                    </tr>
                    
                <?php } ?>
            </tbody>
            
        </table>
        
        
    </div>
</div>


  </div>  
    <style>
.centered {
    width:1000px;
    height: 350px;
    left:60%;
    margin-top:40px !important;
    margin-bottom:40px !important;
    margin: 0 auto;
}   
    </style>

   
<style>
	/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 20%;
  height: 350px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 350px;
}
</style>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
