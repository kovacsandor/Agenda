const fs = require(`fs-extra`)

fs.remove(`production`, removeProductionCallback)

function removeProductionCallback() {
	callback(`Removed production directory.`)()
	fs.copy(`source`, `production/bt9fs3`, copySourceCallback)
}

function copySourceCallback() {
	callback(`Copied source to production directory.`)()
	fs.remove(`production/bt9fs3/scss`, removeSassCallback)
}

function removeSassCallback() {
	callback(`Removed scss directory.`)()
	fs.move(`production/bt9fs3/project`, `production`, callback(`Moved project directory.`))
	fs.move(`production/bt9fs3/php/page`, `production/bt9fs3`, callback(`Moved page directory.`))
	fs.move(`production/bt9fs3/php/index.php`, `production/bt9fs3/index.php`, callback(`Moved index.php file.`))
}

function callback(task) {
	return error => {
		if (error) {
			throw new Error(error)
		}
		console.log(task)
	}
}