

def application(environ, start_response):
	start_response('200 OK',[('Content-Type','text/plain')])
	output = environ['wsgi.input'].read()	
	yield output
