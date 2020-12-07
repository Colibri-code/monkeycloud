const stripe = require("stripe");
const moment = require("moment");

module.exports.cron = {
  checkSubscriptionExpires: {
    schedule: "0 0 0 * * *",
    onTick: async () => {
      var usersToUpdate = [];
      const currentDate = Math.round(new Date().getTime() / 1000);
      const data = await user.find({
        subscriptionDateEnd: { "<=": currentDate },
      });
      if (!data.length) return;

      data.forEach(({ id }) => {
        usersToUpdate.push(
          user.update(id).set({ subscriptionDateEnd: null, typeMember: "free" })
        );
      });
      await Promise.all(usersToUpdate);
    },
  },
  checkSubscriptionStatus: {
    schedule: " * * * * * *",
    onTick: async () => {
      try {
        const now = moment(new Date());
        const Stripe = stripe(sails.config.custom.stripeKey);
        const { data } = await Stripe.subscriptions.list();
        for (var item in data) {
          const startDate = moment.unix(data[item].start_date, "MM/DD/YYYY");
          const userToUpdate = await user.findOne({
            stripeSubId: data[item].id,
          });
          if (now.diff(startDate, "days") === 1) {
            await sails.helpers.sendEmail.with({
              from: "admin@monkeyscloud.com",
              to: userToUpdate.email,
              subject: "Subscription",
              html: `<b>we cannot renew your subscription,check if your payment method is correct </b>`,
            });
          }
        }
      } catch (error) {
        console.error(error);
      }
    },
  },
};
