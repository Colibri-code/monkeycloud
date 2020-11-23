const jwt = require("jsonwebtoken");

module.exports = async (req, res, next) => {
  try {
/*     const token = req.header("Authorization");
    const decoded = jwt.verify(token, sails.config.session.secret);
    const loggedUser = await user.findOne(decoded.id);
    req.user = loggedUser.id; */
    return next();
  } catch (error) {
    res.forbidden();
  }
};
