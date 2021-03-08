#!/usr/bin/python
#Required for interacting with gateway
import cgi, cgitb
cgitb.enable()
#Gateway input data
input_data = cgi.FieldStorage()

#Sets HTML for text printing
print("Content-type:text/html\r\n\r\n")
#print("Hello CGI")
#Looking for blank input
try:
	artist = input_data["artist"].value
except:
	print('No input!')
	raise SystemExit(1)
print(artist)
print("\n")
print(artist[::-1])
