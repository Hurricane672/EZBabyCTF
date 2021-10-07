# EZBabyCTF

## 1. 项目概要设计

 仿照开源项目[ctfd](https://github.com/CTFd/CTFd)

## 2. 项目详细设计

### 2.1 目录结构

``` text
EZBabyCTF:.
│  challenges.html
│  index.html
│  message.html
│  notifications.html
│  scoreboard.html
│  settings.html
│  signin.html
│  signout.html
│  signup.html
│  team.html
│  teams.html
│
└─admin
        add.html
        edit.html
```

## 2.2 数据库结构

```mysql
mysql> use ezbabyctf # 数据库名称
Database changed
mysql> show tables;
+---------------------+
| Tables_in_ezbabyctf |
+---------------------+
| challenges          | # 用于存储题目信息
| done                | # 用于记录用户做完的题目
| notifications       | # 用于储存用户间发送的信息
| scoreboard          | # 用于记录战队分数
| teams               | # 用于储存战队信息
| users               | # 用于储存用户信息
+---------------------+
mysql> desc challenges;
+----------+--------------+------+-----+---------+-------+
| Field    | Type         | Null | Key | Default | Extra |
+----------+--------------+------+-----+---------+-------+
| id       | varchar(10)  | NO   |     | NULL    |       | # 题目编号
| name     | varchar(100) | NO   |     | NULL    |       | # 题目名称
| category | varchar(100) | NO   |     | NULL    |       | # 题目分类：Web，Pwn，Re
| message  | text         | NO   |     | NULL    |       | # 题目描述信息
| value    | int(11)      | NO   |     | NULL    |       | # 题目分值
| flag     | varchar(100) | NO   |     | NULL    |       | # 题目的flag
| file     | varchar(100) | NO   |     | NULL    |       | # 题目文件的储存url（若有）
+----------+--------------+------+-----+---------+-------+
mysql> desc done;
+-----------+-------------+------+-----+---------+-------+
| Field     | Type        | Null | Key | Default | Extra |
+-----------+-------------+------+-----+---------+-------+
| id        | varchar(10) | NO   |     | NULL    |       | # 用户id用以标识用户身份
| challenge | varchar(10) | NO   |     | NULL    |       | # 题目编号
+-----------+-------------+------+-----+---------+-------+
mysql> desc notifications;
+---------+--------------+------+-----+---------+-------+
| Field   | Type         | Null | Key | Default | Extra |
+---------+--------------+------+-----+---------+-------+
| from    | varchar(100) | NO   |     | NULL    |       | # 发送的用户
| to      | varchar(100) | NO   |     | NULL    |       | # 接收的用户
| message | text         | NO   |     | NULL    |       | # 信息内容
+---------+--------------+------+-----+---------+-------+
mysql> desc scoreboard;
+-------+--------------+------+-----+---------+-------+
| Field | Type         | Null | Key | Default | Extra |
+-------+--------------+------+-----+---------+-------+
| id    | int(11)      | NO   |     | NULL    |       | # 战队id
| tname | varchar(100) | NO   |     | NULL    |       | # 战队名
| score | int(11)      | NO   |     | NULL    |       | # 战队得分
+-------+--------------+------+-----+---------+-------+
mysql> desc teams;
+---------+--------------+------+-----+---------+----------------+
| Field   | Type         | Null | Key | Default | Extra          |
+---------+--------------+------+-----+---------+----------------+
| id      | int(11)      | NO   | PRI | NULL    | auto_increment | # 战队id
| tname   | varchar(100) | NO   |     | NULL    |                | # 战队名
| captain | varchar(100) | NO   |     | NULL    |                | # 战队队长
| active  | char(1)      | YES  |     | 1       |                | # 战队状态（是否激活）
+---------+--------------+------+-----+---------+----------------+
mysql> desc users;
+-------+--------------+------+-----+---------+-------+
| Field | Type         | Null | Key | Default | Extra |
+-------+--------------+------+-----+---------+-------+
| id    | varchar(10)  | NO   |     | NULL    |       | # 用户id
| name  | varchar(20)  | NO   |     | NULL    |       | # 用户名
| team  | varchar(100) | NO   |     | NULL    |       | # 用户所属战队
+-------+--------------+------+-----+---------+-------+
```




```mysql
create table `teams` (
`id` int PRIMARY KEY AUTO_INCREMENT,
`tname` varchar(100) not null,
`captain` varchar(100) not null,
`active` char(1) default "1") character set = utf8;

create table `scoreboard` (
`id` int not null,
`tname` varchar(100) not null,
`score` int not null) character set = utf8;

create table `challenges` (
    `id` varchar(10) not null,
    `name` varchar(100) not null,
	`category` varchar(100) not null,
    `message` text not null,
    `value` int not null,
    `flag` varchar(100) not null,
    `file` varchar(100) not null) character set = utf8;
    
create table `notifications` (
    `from` varchar(100) not null,
	`to` varchar(100) not null,
    `message` text not null) character set = utf8;
    
create table `users`(
    `id` varchar(10) not null,
    `name` varchar(20) not null,
    `team` varchar(100) not null
)character set = utf8;

create table `done`(
    `id` varchar(10) not null,
    `challenge` varchar(10) not null
)character set = utf8;
```

