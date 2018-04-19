# YeziiBot [![CodeFactor](https://www.codefactor.io/repository/github/lovelya72/yeziibot/badge)](https://www.codefactor.io/repository/github/lovelya72/yeziibot) ![Open Source Love](https://badges.frapsoft.com/os/v2/open-source.svg?v=102) [![License: AGPL v3](https://img.shields.io/badge/License-AGPL%20v3-blue.svg)](https://www.gnu.org/licenses/agpl-3.0)

YeziiBot是一个基于[kjBot](https://github.com/kj415j45/kjBot)框架核心制作的拥有实质功能的PHP QQ机器人。架构于[coolq-php-sdk](https://github.com/kilingzhang/coolq-php-sdk)。

请注意：您需要一个酷Q(非自由软件) +http接口才能运行这些脚本！

## 运行要求
1. CoolQ Air/Pro(非自由软件)
2. nginx>=1.10
3. PHP>=7.0
4. CoolQ-http-api

## 如何安装
1. 安装CoolQ Air或CoolQ Pro，并在其中安装并启用[CoolQ-http-api](https://github.com/richardchien/coolq-http-api).
2. 在CoolQ的根目录（或者任意你喜欢的地方）创建一个文件夹，将YeziiBot的源码下载并完整的放进去.
3. 打开src/group，创建一个me.group文件，文本编辑器打开并直接加入你的QQ号，更多的QQ号请每行放一个QQ号
4. 在index.php中的第11行，将yourtokenhere换成一串你的token（如果你在CoolQ-http-apt的token配置项没有配置则可跳过这一步，因为添加token会减慢你的bot）。
5. 将具有php功能nginx的root指向<你刚才创建的的php文件夹>/src并启动服务，建议使用一个非80或443的端口！
6. 在coolq-http-api中的post_url配置项配置为<你的localhost(或者php服务器所在的IP地址)>:<nginx所在的端口>
7. 玩的开心~
