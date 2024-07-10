from flask import Flask, request
import os

app = Flask(__name__)


@app.route("/list_users", methods=["GET"])
def list_users():
    target = request.args.get("target", "")
    command = f"ls {target}"
    result = os.popen(command).read()
    return f"<pre>{result}</pre>"


if __name__ == "__main__":
    app.run(host="0.0.0.0", port=3100)
