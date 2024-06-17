<form class="adduser" action="process_adduser.php" method="POST">
    <div class="item">
    <input type="text" placeholder="Enter last name" id="name" name="name" required> 
    </div>
    <div class="item">
    <input type="date" id="birthDate" name="birthDate" required> 
    </div>
    <div class="item">
            <select id="studyType" name="studyType" required>
        <option>Full-Time</option>
        <option>Non-Full-Time</option>
        </select>
    </div>
    <div class="item"> 
        <button type="submit">
        Add user
    </button>
    </div>
   
</form>