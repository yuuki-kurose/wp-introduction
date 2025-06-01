<?php get_header(); ?>
<div class="chat">
  <h3 class="chat__title">AIと会話してみよう</h3>
  <ul class="chat__window">
    <li class="chat__request" id="chat-request"><!-- ここにリクエストメッセージを表示 --></li>
    <li class="chat__response" id="chat-response"><!-- ここにAIの応答を表示 --></li>
  </ul>
  <!-- フォーム -->
  <form class="chat__input" id="chat-form">
    <input type="text" id="chat-input" placeholder="AIに話しかけてみてください"></input>
    <button type="submit">送信</button>
  </form>
</div>

<script>
  document.getElementById('chat-form').addEventListener('submit', (e) => {
    e.preventDefault();
    // 送信ボタンがクリックされたときの処理
    const inputText = document.getElementById('chat-input').value;
    if(inputText.trim() === '') {
      return;
    }
    // リクエスト チャット送信時に生成されるHTMLに使用する値の取得
    const sendTime = new Date().toLocaleString(); // 送信時刻
    const sender = 'あなた'; // 送信者

    // リクエスト チャットメッセージ用のHTMLを生成
    const requestHTML = `
        <h3 class="chat__request-text">${inputText}</h3>
        <div class="chat__request-detail">
          <p class="chat__request-sender">${sender}</p>
          <p class="chat__request-time">${sendTime}</@>
        </div>
    `;

    // リクエスト　チャットメッセージのCSSを制御
    document.getElementById('chat-request').style.display = 'block';
    // リクエスト テキストを取得・表示する
    document.getElementById('chat-request').innerHTML = requestHTML;

    // リクエスト テキストをカスタムプラグインに送信・受信する
    fetch('<?php echo admin_url("admin-ajax.php") ?>', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: new URLSearchParams({
        action: 'gemini_request',
        user_message: inputText
      })
    })
    .then(response => response.json())
    .then(data => {
      if(data.success) {
        /**
         * レスポンスを受け取ったときの処理
         */
        // フォーム入力欄を空にする
        document.getElementById('chat-input').value = '';
        // レスポンス 送信者
        const responseSender = 'AI'; // 送信者

        // レスポンス チャットメッセージ用のHTMLを生成
        const responseHTML = `
            <h3 class="chat__response-text">${data.data}</h3>
            <div class="chat__response-detail">
              <p class="chat__response-sender">${responseSender}</p>
              <p class="chat__response-time">${sendTime}</p>
            </div>
        `;
        // レスポンス　チャットメッセージのCSSを制御
        document.getElementById('chat-response').style.display = 'block';
        // レスポンス テキストを取得・表示する
        document.getElementById('chat-response').innerHTML = responseHTML;
      } else {
        console.error('Error:', data.data);
      }
    })
  })
</script>