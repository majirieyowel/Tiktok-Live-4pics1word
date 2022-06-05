(function () {
  let messageNode = '[data-e2e="chat-message"]',
    answerPrefix = ">",
    hostUrl = "http://localhost:8000/save-comment",
    loopInterval = 2000;

  document.querySelector('[data-e2e="control-icon"]').click(); //pause streaming to save bandwith

  function pushToServer(payload) {
    fetch(hostUrl, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(payload),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log("Success:", data);
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }

  function extractAnswer(rawComment) {
    // validate answer contains the answerPrefix
    if (!rawComment.includes(answerPrefix)) return false;

    rawComment.trim();

    if (rawComment.indexOf(" ") != -1) return false;

    return rawComment;
  }

  function extractNameAndComment(element) {
    let rawComment, commentNode;

    commentNode = element.childNodes[1].childNodes[2];

    if (!commentNode) {
      commentNode = element.childNodes[1].childNodes[1];
    }

    rawComment = commentNode.innerText;

    if ((answer = extractAnswer(rawComment))) {
      let payload = {};
      payload.name =
        element.childNodes[1].childNodes[0].childNodes[0].innerText;
      payload.image =
        element.childNodes[0].childNodes[0].childNodes[0].src;
      payload.answer = answer.substring(1);

      pushToServer(payload);

      console.log("Payload", payload);
    }

    // delete comment from dom
    element.remove();
  }

  function fetchMessages() {
    let messages = document.querySelectorAll(messageNode);

    messages.forEach((element) => {
      extractNameAndComment(element);
    });
  }

  setInterval(() => {
    // console.log("Running..." + Math.floor(Date.now() / 1000));
    fetchMessages();
  }, loopInterval);
})();
