<!-- <div class="container-fluid">
    <form action="" id="book-form">
        <div class="form-group">
            <input name="package_id" type="hidden" value="<?php echo $_GET['package_id'] ?>">
            <label for="checkIn">Check In</label>
            <input type="date" class="form-control" required name="schedule" id="checkIn">
            <label for="checkOut">Check Out</label>
            <input type="date" class="form-control" required name="checkout" id="checkOut">
            <label for="amount">Amount</label>
            <input type="text" class="form-control" required name="amount" id="amount" readonly>
            <label for="numStay">Number of Stay</label>
            <input type="text" class="form-control" required name="numStay" id="numStay" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    $(function () {
        $('#book-form').submit(function (e) {
            e.preventDefault();
            start_loader();
            
            // Calculate the number of stay
            var checkInDate = new Date($('#checkIn').val());
            var checkOutDate = new Date($('#checkOut').val());
            var numStay = Math.ceil((checkOutDate - checkInDate) / (1000 * 60 * 60 * 24));
            $('#numStay').val(numStay);

            // Calculate the amount based on a hypothetical daily rate (you should replace this with your actual pricing logic)
            var dailyRate = 100; // replace with your actual daily rate
            var amount = numStay * dailyRate;
            $('#amount').val(amount);

            // Perform Ajax request
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=book_tour",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                error: function (err) {
                    console.log(err);
                    alert_toast("An error occurred", 'error');
                    end_loader();
                },
                success: function (resp) {
                    if (typeof resp === 'object' && resp.status === 'success') {
                        alert_toast("Book Request Successfully sent.");
                        $('.modal').modal('hide');
                    } else {
                        console.log(resp);
                        alert_toast("An error occurred", 'error');
                    }
                    end_loader();
                }
            });
        });
    });
</script> -->
<div class="container-fluid">
    <form action="" id="book-form">
        <div class="form-group">
            <label for="roomType">Select Room Type</label>
            <select class="form-control" id="roomType" name="roomType" required>
                <option value="luxury">Luxury Room</option>
                <option value="deluxe">Deluxe Room</option>
                <option value="single">Single Room</option>

                <option value="double">Double Room</option>

                <!-- Add more options for other room types if needed -->
            </select>
            <input name="package_id" type="hidden" value="<?php echo $_GET['package_id'] ?>">
            <label for="checkIn">Check In</label>
            <input type="date" class="form-control" required name="schedule" id="checkIn">
            <label for="checkOut">Check Out</label>
            <input type="date" class="form-control" required name="checkout" id="checkOut">
            <label for="amount">Amount</label>
            <input type="text" class="form-control" required name="amount" id="amount" readonly>
            <label for="numStay">Number of Stay</label>
            <input type="text" class="form-control" required name="numStay" id="numStay" readonly>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    $(function () {
        $('#book-form').submit(function (e) {
            e.preventDefault();
            start_loader();
            
            // Get the selected room type
            var roomType = $('#roomType').val();

            // Calculate the number of stay
            var checkInDate = new Date($('#checkIn').val());
            var checkOutDate = new Date($('#checkOut').val());
            var numStay = Math.ceil((checkOutDate - checkInDate) / (1000 * 60 * 60 * 24));
            $('#numStay').val(numStay);

            // Fetch the rate based on the selected room type
            var rate = getRateByRoomType(roomType);

            // Calculate the amount based on the rate and number of stay
            var amount = numStay * rate;
            $('#amount').val(amount);

            // Perform Ajax request
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=book_tour",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                error: function (err) {
                    console.log(err);
                    alert_toast("An error occurred", 'error');
                    end_loader();
                },
                success: function (resp) {
                    if (typeof resp === 'object' && resp.status === 'success') {
                        alert_toast("Book Request Successfully sent.");
                        $('.modal').modal('hide');
                    } else {
                        console.log(resp);
                        alert_toast("An error occurred", 'error');
                    }
                    end_loader();
                }
            });
        });

        // Function to get the rate based on room type
        function getRateByRoomType(roomType) {
            // Replace this with your actual pricing logic
            if (roomType === 'luxury') {
                return 3500; // Luxury room rate per day
            } else if (roomType === 'deluxe') {
                return 3000; // Deluxe room rate per day
            }
            if (roomType === 'single') {
                return 2000; // Luxury room rate per day
            } else if (roomType === 'double') {
                return 2700; // Deluxe room rate per day
            }
            // Add more conditions for other room types if needed
        }
    });
</script>


