<?php get_header(); ?>
<div class="login">
  <form class="login__form">
    <div class="login__container">
      <label for="username">ユーザー名</label>
      <input type="text" id="username" placeholder="ユーザー名を入力してください" required />
    </div>
    <div class="login__container">
      <label for="password">パスワード</label>
      <input type="password" id="password" placeholder="パスワードを入力してください" required />
    </div>
    <div class="login__button">
      <button type="submit" id="login-button">ログイン</button>
      <button type="button" id="login-register"><a href="">新規登録</a></button>
    </div>
  </form>
</div>

<script>
  document.getElementById('login-button').addEventListener('submit', (e) => {
    e.preventDefault();
    const userName = document.getElementById('username').value; // ユーザー名を取得
    const passWord = document.getElementById('password').value; // パスワードを取得

    const userRegex = /^[a-z0-9_]{1,8}$/; // ユーザー名の正規表現
    const passRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).{8,}$/; // パスワードの正規表現

    // 未入力チェック
    if(userName === '' && passWord === '') {
      alert('ユーザー名とパスワードを入力してください');
      return;
    } else if(userName === '') {
      alert('ユーザー名を入力してください');
      return;
    } else if(passWord === '') {
      alert('passwordを入力してください');
      return;
    };

    // 正しい形式がチェック
    if(!userRegex.test(userName)) {
      alert('ユーザー名が違います');
      return;
    } else if(!passRegex.test(passWord)) {
      alert('パスワードが違います');
      return;
    }

    // ログイン情報を送信
    fetch('<?php echo admin_url("admin-ajax.php") ?>', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: new URLSearchParams({
        action: 'login_user',
        username: userName,
        password: passWord
      })
    })
  });
</script>
