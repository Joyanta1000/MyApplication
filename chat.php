<div class="container">
    <h3 class=" text-center"></h3>
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>
                    <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar" placeholder="Search">
                            <span class="input-group-addon">
                                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="inbox_chat">
                    <div class="chat_list active_chat">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                                <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                <p>Test, which is a new approach to have all solutions
                                    astrology under one roof.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mesgs">
                <div class="msg_history">
                    <?php
                    session_start();
                    $conn = mysqli_connect("localhost", "root", "", "myapplication");
                    // $conn = $this->connect();

                    // if(!empty($_POST['data'])){
                    //     return $_POST['data'];

                    $s = mysqli_query($conn, "SELECT chat.*, user.name, user.avatar FROM chat INNER JOIN user ON chat.sender_id=user.id WHERE `message_id` = 1;");
                    $rows = mysqli_fetch_all($s);
                    if ($rows) {
                        foreach ($rows as $row) {
                            $message_id = $row[2];
                    ?>
                            <?php if ($row[1] != $_SESSION['id']) { ?>
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img src="<?php echo $row[8]; ?>" alt="sunil" style="border-radius: 50px;"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p><?php echo $row[3]; ?></p>
                                            <!-- <span class="time_date"> 11:01 AM | June 9</span> -->
                                        </div>
                                    </div>
                                </div>
                                <br>
                            <?php } else if ($row[1] == $_SESSION['id']) { ?>
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p><?php echo $row[3]; ?></p>
                                        <!-- <span class="time_date"> 11:01 AM | June 9</span> -->
                                    </div>
                                </div>
                                <br>
                            <?php } ?>

                    <?php
                        }
                    } else {
                        echo "<script>alert('No Message)</script>";
                    }
                    ?>

                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <input type="hidden" name="session_id" id="session_id" value="<?php echo $_SESSION['id'] ?>">
                        <input type="hidden" id="message_id" value="<?php echo $message_id; ?>">
                        <input type="text" id="write_msg" class="write_msg" placeholder="Type a message" />
                        <button class="msg_send_btn" name="sendMessage" id="sendMessage" value="sendMessage" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(".msg_history").animate({
        scrollTop: 100000000000000000000000000
    }, "fast");
</script>

<script>
    $(document).ready(function() {

        $('#sendMessage').click(function() {
            Send();
        });
    });

    function Send() {

        $(".msg_history").animate({
            scrollTop: 100000000000000000000000000
        }, "fast");

        console.log($('#write_msg').val(), $('#message_id').val(), $('#session_id').val(), $('#sendMessage').val());

        console.log('hey');

        $.ajax({
            url: "send.php",
            type: "POST",
            data: {
                sender_id: $('#session_id').val(),
                message_id: $('#message_id').val(),
                message: $('#write_msg').val(),
                sendMessage: $('#sendMessage').val()
            },
            cache: false,
            success: function(data) {
                $('.msg_history').html('');
                $('#write_msg').val('');
            },
            Error: function(textMsg) {

                $('#Result').text("Error: " + Error);
            }
        });
        // }
    }
</script>