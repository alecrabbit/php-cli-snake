 ### Redirect 
 ```
 php w_reactphp.php > out_full.txt
 ```
```
$ cat out_full.txt 
......Message One: is written to StdOut.
......Message Two: is written to StdOut.
......
```

 ### Pipe 
 ```
 php w_reactphp.php | grep One
 ```
```
......Message One: is written to StdOut.
```
 ### Pipe & Redirect
 ```
 php w_reactphp.php | grep Two > out_two.txt
 ```
```
$ cat out_two.txt 
......Message Two: is written to StdOut.
```