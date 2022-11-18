<style>
  @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css");

  .bi {
    margin: 10px;
    color: #fff;
  }

  .bi:hover {
    color: red;
  }

  .icon {
    text-align: left;
  }

  .footer {
    display: flex;
    justify-content: space-between;
  }

  @media(max-width: 991px) {
    .footer {
      flex-direction: column;
      text-align: left;
      width: 100%;
      margin: px;
    }

    .icon {
      margin-bottom: 2%;
    }
  }
</style>

<footer>
  <a href="<?= ROOT ?>admin/index.php" style="color: unset;">
    <h2>Strong Tower we create shape</h2><br>
  </a>
  <div class="footer">
    <div class="icon">
      <a href="https://web.facebook.com/StrongTowerGym" style="color:#fff;"><i class="bi bi-facebook"></i>Strong Tower Gym</a><br>
      <a href="" style="color:#fff;"><i class="bi bi-envelope"></i>strongtower@gmail.com</a> <br>
      <a href="" style="color:#fff;"><i class="bi bi-telephone-fill"></i>: 09083403181</a>
    </div>

    <div class="schedule">
      <p>Monday to Saturday</p>
      <p>Time: 8:00 AM to 8:00 PM</p>
    </div>
  </div>
</footer>

</body>

</html>