const jwt = require("jsonwebtoken");

module.exports = async (req, res, next) => {
  try {
    const token = req.header("Authorization");
    const decoded = jwt.verify(token, sails.config.session.secret);
    const user = await User.findOne(decoded.id);
    req.user = user.id;
    return next();
  } catch (error) {
    res.forbidden();
  }
};
