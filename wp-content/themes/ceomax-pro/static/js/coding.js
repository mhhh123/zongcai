var conversionMap = {
    "1": "1",
    "2": "2",
    "3": "4",
    "4": "6",
    "5": "8",
    "6":"3",
    "7":"5",
    "8":"7",
    "9":"9",
    "A":'1',
    "B":'2',
    "C":"3",
    "D":"4",
    "E":"5",
    "F":"6",
    "G":"7",
    "H":"8",
    "I":"9",
    "J":"10",
    "K":"11",
    "L":"12",
    "M":"13",
    "N":"14",
    "O":"15",
    "P":"16",
    "Q":"17",
    "R":"18",
    "S":"19",
    "T":"20",
    "U":"21",
    "V":"22",
    "W":"23",
    "X":"24",
    "Y":"25",
    "Z":"26"
};
document.getElementById('onclick').onclick = function () {
    var nameValue = document.getElementById('name').value;
    var inputValues = nameValue.split('');
    var upperCaseArray = inputValues.map(function(char) {
        return char.toUpperCase();
    });
    var resultArray = [];

    // 逐个对比并拼接结果
    upperCaseArray.forEach(function(item) {
        // 尝试从映射中找到对应的值
        var convertedValue = conversionMap[item] || "未找到对应的值";
        resultArray.push(convertedValue);
    });

    // 拼接最终的结果
    var finalResult = resultArray.join('');

    // 显示消息并更新内容
    var messageDiv = document.getElementById('message');
    messageDiv.style.display = 'block';
    messageDiv.innerHTML = "验证码: " + finalResult;

    var result = confirm("请登录！");

    if(result) {
        // 弹窗点击确定后的逻辑代码
        window.location.href = "login.html";
    } else {
        // 弹窗点击取消后的逻辑代码
        window.location.href = "index.html";
    }
};